<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class AboutController extends Controller
{
      public function index()
    {
        $about = about::all();
        return view('admin.about.index', compact('about'));
    }

    public function create() {
        $about = about::all();
        return view('admin.about.create', compact('about'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'name' => ['nullable', 'string'],
            'profession' => ['nullable', 'string'],
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $about = about::create($request->all());
            if ($request->image) {
                $this->storeImage($about);
            }
            return redirect()->route('about.index');
        }
    }



    public function edit($id)
    {
        $about = about::find($id);
        return view('admin.about.edit', compact('about'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => ['nullable', 'string'],
            'profession' => ['nullable', 'string'],
         
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $about = about::find($id);
            $about->update($request->all());
            if ($request->image) {
                $this->storeImage($about);
            }
        }
        return redirect()->route('about.index');
    }






    public function destroy($id)
    {
        $about = about::find($id);
        if ($about->image){
            unlink(public_path() . '/storage/' . $about->image );
        }
        $about->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('about.index');
    }

    

    private function storeImage($about)
    {
        if (request()->has('image')) {
            $about->update([
                'image' => \request()->image->store('about', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $about->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $about = $request->upload;
            $about = $about->store('about', 'public');
            Image::make(public_path('/storage/' . $about))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$about);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
