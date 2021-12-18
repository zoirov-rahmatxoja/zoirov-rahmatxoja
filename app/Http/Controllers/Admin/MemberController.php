<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class MemberController extends Controller
{  public function index()
    {
        $member = Member::all();
        return view('admin.member.index', compact('member'));
    }

    public function create() {
        $member = Member::all();
        return view('admin.member.create', compact('member'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'name' => ['nullable', 'string'],
            'profession' => ['nullable', 'string'],
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $member = member::create($request->all());
            if ($request->image) {
                $this->storeImage($member);
            }
            return redirect()->route('member.index');
        }
    }



    public function edit($id)
    {
        $member = Member::find($id);
        return view('admin.member.edit', compact('member'));
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
            $member = Member::find($id);
            $member->update($request->all());
            if ($request->image) {
                $this->storeImage($member);
            }
        }
        return redirect()->route('member.index');
    }






    public function destroy($id)
    {
        $member = Member::find($id);
        if ($member->image){
            unlink(public_path() . '/storage/' . $member->image );
        }
        $member->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('member.index');
    }

    

    private function storeImage($member)
    {
        if (request()->has('image')) {
            $member->update([
                'image' => \request()->image->store('member', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $member->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $member = $request->upload;
            $member = $member->store('member', 'public');
            Image::make(public_path('/storage/' . $member))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$member);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
