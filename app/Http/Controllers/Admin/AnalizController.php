<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analiz;
use Illuminate\Http\Request;

class AnalizController extends Controller
{
    public function index()
    {
        
        $analiz = Analiz::all();
        return view('admin.analiz.index',compact('analiz'));
    }


    public function create()
    {
        $analiz = Analiz::all();
        return view('admin.analiz.create',compact('analiz'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'text_uz'  => ['nullable', 'string'],
            'text_ru'  => ['nullable', 'string'],
            'title_ru'  => ['nullable', 'string'],
            'title_uz'  => ['nullable', 'string'],
           
            
            
        ]);
            if ($valid) {
                $analiz =Analiz::create($request->all());
                return redirect()->route('analiz.index');
            }
    }

        
    public function edit($id)
    {
        $analiz =Analiz::find($id);
        return view('admin.analiz.edit', compact('analiz'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'text_uz'  => ['nullable', 'string'],
            'text_ru'  => ['nullable', 'string'],
            'title_uz'  => ['nullable', 'string'],
            'title_ru'  => ['nullable', 'string'],
           
           
        ]);
            if ($valid) {
                $analiz =Analiz::find($id);
                $analiz->update($request->all());
               
            }
            return redirect()->route('analiz.index');
    }


    public function destroy($id)
    {
        $analiz =Analiz::find($id);
        
        $analiz->delete();
        // Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('analiz.index');
    
    }
}