<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembersCompany;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class MembersCompanyController extends Controller
{
    public function index()
    {
        $members = MembersCompany::all();
        return view('admin.membercompany.index', compact('memberscompany'));
    }

    public function create() {
        $members = MembersCompany::all();
        return view('admin.membercompany.create', compact('memberscompany'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'name' => ['nullable', 'string'],
            'profession' => ['nullable', 'string'],
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $members = MembersCompany::create($request->all());
            if ($request->image) {
                $this->storeImage($members);
            }
            return redirect()->route('membercompany.index');
        }
    }



    public function edit($id)
    {
        $members = MembersCompany::find($id);
        return view('admin.membercompany.edit', compact('memberscompany'));
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
            $members = MembersCompany::find($id);
            $members->update($request->all());
            if ($request->image) {
                $this->storeImage($members);
            }
        }
        return redirect()->route('memberscompany.index');
    }






    public function destroy($id)
    {
        $members = MembersCompany::find($id);
        if ($members->image){
            unlink(public_path() . '/storage/' . $members->image );
        }
        $members->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('membercompany.index');
    }

    

    private function storeImage($members)
    {
        if (request()->has('image')) {
            $members->update([
                'image' => \request()->image->store('membercompany', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $members->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $members = $request->upload;
            $members = $members->store('membercompany', 'public');
            Image::make(public_path('/storage/' . $members))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$members);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}