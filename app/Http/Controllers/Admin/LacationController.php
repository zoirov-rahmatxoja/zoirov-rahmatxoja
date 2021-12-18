<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loacation;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class LacationController extends Controller
{
    public function index()
    {
        $location = Loacation::all();
        return view('admin.location.index', compact('location'));
    }

    public function create() {
        $location = Loacation::all();
        return view('admin.location.create', compact('location'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $location = Loacation::create($request->all());
            if ($request->image) {
                $this->storeImage($location);
            }
            return redirect()->route('location.index');
        }
    }



    public function edit($id)
    {
        $location = Loacation::find($id);
        return view('admin.location.edit', compact('location'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
        ]);


        if ($valid) {
            $location = Loacation::find($id);
            $location->update($request->all());
            if ($request->image) {
                $this->storeImage($location);
            }
        }
        return redirect()->route('location.index');
    }






    public function destroy($id)
    {
        $location = Loacation::find($id);
        if ($location->image){
            unlink(public_path() . '/storage/' . $location->image );
        }
        $location->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('location.index');
    }

    

    private function storeImage($location)
    {
        if (request()->has('image')) {
            $location->update([
                'image' => \request()->image->store('location', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $location->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $location = $request->upload;
            $location = $location->store('location', 'public');
            Image::make(public_path('/storage/' . $location))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$location);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
