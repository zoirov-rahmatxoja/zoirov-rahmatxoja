<?php

namespace App\Http\Controllers\Admin;
use App\Models\AboutCompany;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class AboutcompanyController extends Controller
{
    public function index()
    {
        $aboutcompany = aboutcompany::all();
        return view('admin.aboutcompany.index', compact('aboutcompany'));
    }

    public function create() {
        $aboutcompany = aboutcompany::all();
        return view('admin.aboutcompany.create', compact('aboutcompany'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'title_1_uz' => ['nullable', 'string'],
            'title_1_ru' => ['nullable', 'string'],
            'title_2_uz' => ['nullable', 'string'],
            'title_2_ru' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $aboutcompany = aboutcompany::create($request->all());
            if ($request->image) {
                $this->storeImage($aboutcompany);
            }
            return redirect()->route('aboutcompany.index');
        }
    }



    public function edit($id)
    {
        $aboutcompany = aboutcompany::find($id);
        return view('admin.aboutcompany.edit', compact('aboutcompany'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_1_uz' => ['nullable', 'string'],
            'title_1_ru' => ['nullable', 'string'],
            'title_2_uz' => ['nullable', 'string'],
            'title_2_ru' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $aboutcompany = aboutcompany::find($id);
            $aboutcompany->update($request->all());
            if ($request->image) {
                $this->storeImage($aboutcompany);
            }
        }
        return redirect()->route('aboutcompany.index');
    }






    public function destroy($id)
    {
        $aboutcompany = aboutcompany::find($id);
        if ($aboutcompany->image){
            unlink(public_path() . '/storage/' . $aboutcompany->image );
        }
        $aboutcompany->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('aboutcompany.index');
    }

    

    private function storeImage($aboutcompany)
    {
        if (request()->has('image')) {
            $aboutcompany->update([
                'image' => \request()->image->store('aboutcompany', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $aboutcompany->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $aboutcompany = $request->upload;
            $aboutcompany = $aboutcompany->store('aboutcompany', 'public');
            Image::make(public_path('/storage/' . $aboutcompany))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$aboutcompany);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}