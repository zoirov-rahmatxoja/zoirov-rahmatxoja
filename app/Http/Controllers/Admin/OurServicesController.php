<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurServices;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OurServicesController extends Controller
{
    public function index()
    {
        $ourservices = OurServices::all();
        return view('admin.ourservices.index', compact('ourservices'));
    }

    public function create() {
        $ourservices = OurServices::all();
        return view('admin.ourservices.create', compact('ourservices'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
   
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $ourservices = OurServices::create($request->all());
            if ($request->image) {
                $this->storeImage($ourservices);
            }
            return redirect()->route('ourservices.index');
        }
    }



    public function edit($id)
    {
        $ourservices = OurServices::find($id);
        return view('admin.ourservices.edit', compact('ourservices'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([

         
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $ourservices = OurServices::find($id);
            $ourservices->update($request->all());
            if ($request->image) {
                $this->storeImage($ourservices);
            }
        }
        return redirect()->route('ourservices.index');
    }






    public function destroy($id)
    {
        $ourservices = OurServices::find($id);
        if ($ourservices->image){
            unlink(public_path() . '/storage/' . $ourservices->image );
        }
        $ourservices->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('ourservices.index');
    }

    

    private function storeImage($ourservices)
    {
        if (request()->has('image')) {
            $ourservices->update([
                'image' => \request()->image->store('ourservices', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $ourservices->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $ourservices = $request->upload;
            $ourservices = $ourservices->store('ourservices', 'public');
            Image::make(public_path('/storage/' . $ourservices))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$ourservices);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}