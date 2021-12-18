<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Number;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class NumberController extends Controller
{
    public function index()
    {
        
        $number = Number::all();
        return view('admin.number.index',compact('number'));
    }


    public function create()
    {
        $number = Number::all();
        return view('admin.number.create',compact('number'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'number'  => ['nullable', 'string'],
            'title_ru'  => ['nullable', 'string'],
            'title_uz'  => ['nullable', 'string'],
            
            
        ]);
            if ($valid) {
                $number =number::create($request->all());
                return redirect()->route('number.index');
            }
    }

        
    public function edit($id)
    {
        $number =number::find($id);
        return view('admin.number.edit', compact('number'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'number'  => ['nullable', 'string'],
            'title_uz'  => ['nullable', 'string'],
            'title_ru'  => ['nullable', 'string'],
           
        ]);
            if ($valid) {
                $number =number::find($id);
                $number->update($request->all());
               
            }
            return redirect()->route('number.index');
    }


    public function destroy($id)
    {
        $number =number::find($id);
        
        $number->delete();
        Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('number.index');
    
    }
}