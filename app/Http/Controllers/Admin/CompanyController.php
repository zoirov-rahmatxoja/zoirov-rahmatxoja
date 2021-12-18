<?php

namespace App\Http\Controllers\Admin;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;   

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view('admin.company.index', compact('company'));
    }

    public function create() {
        $company = Company::all();
        return view('admin.company.create', compact('company'));
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
            $company = Company::create($request->all());
            if ($request->image) {
                $this->storeImage($company);
            }
            return redirect()->route('company.index');
        }
    }



    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.edit', compact('company'));
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
            $company = Company::find($id);
            $company->update($request->all());
            if ($request->image) {
                $this->storeImage($company);
            }
        }
        return redirect()->route('company.index');
    }






    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company->image){
            unlink(public_path() . '/storage/' . $company->image );
        }
        $company->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('company.index');
    }

    

    private function storeImage($company)
    {
        if (request()->has('image')) {
            $company->update([
                'image' => \request()->image->store('company', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $company->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $company = $request->upload;
            $company = $company->store('company', 'public');
            Image::make(public_path('/storage/' . $company))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$company);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}