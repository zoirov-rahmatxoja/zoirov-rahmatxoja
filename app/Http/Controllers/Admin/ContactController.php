<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index', compact('contact'));
    }

    public function create() {
        $contact = Contact::all();
        return view('admin.contact.create', compact('contact'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
   
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $contact = Contact::create($request->all());
            if ($request->image) {
                $this->storeImage($contact);
            }
            return redirect()->route('contact.index');
        }
    }



    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([

         
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $contact = Contact::find($id);
            $contact->update($request->all());
            if ($request->image) {
                $this->storeImage($contact);
            }
        }
        return redirect()->route('contact.index');
    }






    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact->image){
            unlink(public_path() . '/storage/' . $contact->image );
        }
        $contact->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('contact.index');
    }

    

    private function storeImage($contact)
    {
        if (request()->has('image')) {
            $contact->update([
                'image' => \request()->image->store('contact', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $contact->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $contact = $request->upload;
            $contact = $contact->store('contact', 'public');
            Image::make(public_path('/storage/' . $contact))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$contact);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}