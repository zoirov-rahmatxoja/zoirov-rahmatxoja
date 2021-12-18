<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Start;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class StartController extends Controller
{
    public function index()
    {
        $start = start::all();
        return view('admin.start.index', compact('start'));
    }

    public function create() {
        $start = start::all();
        return view('admin.start.create', compact('start'));
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
            $start = start::create($request->all());
            if ($request->image) {
                $this->storeImage($start);
            }
            return redirect()->route('start.index');
        }
    }



    public function edit($id)
    {
        $start = start::find($id);
        return view('admin.start.edit', compact('start'));
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
            $start = start::find($id);
            $start->update($request->all());
            if ($request->image) {
                $this->storeImage($start);
            }
        }
        return redirect()->route('start.index');
    }






    public function destroy($id)
    {
        $start = start::find($id);
        if ($start->image){
            unlink(public_path() . '/storage/' . $start->image );
        }
        $start->delete();
        Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('start.index');
    }

    

    private function storeImage($start)
    {
        if (request()->has('image')) {
            $start->update([
                'image' => \request()->image->store('start', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $start->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $start = $request->upload;
            $start = $start->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $start))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$start);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
