<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;   

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = aboutus::all();
        return view('admin.aboutus.index', compact('aboutus'));
    }

    public function create() {
        $aboutus = aboutus::all();
        return view('admin.aboutus.create', compact('aboutus'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
         
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $aboutus = aboutus::create($request->all());
            if ($request->image) {
                $this->storeImage($aboutus);
            }
            return redirect()->route('aboutus.index');
        }
    }



    public function edit($id)
    {
        $aboutus = aboutus::find($id);
        return view('admin.aboutus.edit', compact('aboutus'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
           
         
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $aboutus = aboutus::find($id);
            $aboutus->update($request->all());
            if ($request->image) {
                $this->storeImage($aboutus);
            }
        }
        return redirect()->route('aboutus.index');
    }






    public function destroy($id)
    {
        $aboutus = aboutus::find($id);
        if ($aboutus->image){
            unlink(public_path() . '/storage/' . $aboutus->image );
        }
        $aboutus->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('aboutus.index');
    }

    

    private function storeImage($aboutus)
    {
        if (request()->has('image')) {
            $aboutus->update([
                'image' => \request()->image->store('aboutus', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $aboutus->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $aboutus = $request->upload;
            $aboutus = $aboutus->store('aboutus', 'public');
            Image::make(public_path('/storage/' . $aboutus))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$aboutus);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}