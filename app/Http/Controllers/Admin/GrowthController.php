<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Growth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class GrowthController extends Controller
{
    public function index()
    {
        $growth = growth::all();
        return view('admin.growth.index', compact('growth'));
    }

    public function create() {
        $growth = growth::all();
        return view('admin.growth.create', compact('growth'));
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
            $growth = growth::create($request->all());
            if ($request->image) {
                $this->storeImage($growth);
            }
            return redirect()->route('growth.index');
        }
    }



    public function edit($id)
    {
        $growth = growth::find($id);
        return view('admin.growth.edit', compact('growth'));
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
            $growth = growth::find($id);
            $growth->update($request->all());
            if ($request->image) {
                $this->storeImage($growth);
            }
        }
        return redirect()->route('growth.index');
    }






    public function destroy($id)
    {
        $growth = growth::find($id);
        if ($growth->image){
            unlink(public_path() . '/storage/' . $growth->image );
        }
        $growth->delete();
        Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('growth.index');
    }

    

    private function storeImage($growth)
    {
        if (request()->has('image')) {
            $growth->update([
                'image' => \request()->image->store('growth', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $growth->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $growth = $request->upload;
            $growth = $growth->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $growth))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$growth);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
