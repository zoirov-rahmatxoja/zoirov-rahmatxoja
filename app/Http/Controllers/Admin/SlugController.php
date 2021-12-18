<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slug;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function index()
    {
        
        $market = Slug::all();
        return view('admin.market.index',compact('market'));
    }


    public function create()
    {
        $market = Slug::all();
        return view('admin.market.create',compact('market'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
    
            'title_1_ru'  => ['nullable', 'string'],
            'title_1_uz'  => ['nullable', 'string'],
            'title_2_uz'  => ['nullable', 'string'],
            'title_2_ru'  => ['nullable', 'string'],
            'text_uz'  =>['nullable','string'],
            'text_ru'  => ['nullable', 'string'],
            
            
        ]);
            if ($valid) {
                $market =Slug::create($request->all());
                return redirect()->route('market.index');
            }
    }

        
    public function edit($id)
    {
        $market =Slug::find($id);
        return view('admin.market.edit', compact('market'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
          
            'title_1_ru'  => ['nullable', 'string'],
            'title_1_uz'  => ['nullable', 'string'],
            'title_2_uz'  => ['nullable', 'string'],
            'title_2_ru'  => ['nullable', 'string'],
            'text_uz'  =>['nullable','string'],
            'text_ru'  => ['nullable', 'string'],
        ]);
            if ($valid) {
                $market =Slug::find($id);
                $market->update($request->all());
               
            }
            return redirect()->route('market.index');
    }


    public function destroy($id)
    {
        $market =Slug::find($id);
        
        $market->delete();
        // Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('market.index');
    
    }
}