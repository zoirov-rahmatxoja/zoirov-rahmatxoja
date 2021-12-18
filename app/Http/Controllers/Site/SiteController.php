<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Slug;
use Illuminate\Http\Request;

class SiteController extends Controller
{
   


    public function index( Slug $slug )
    {

        $bir = Slug::where('choose','bir')->get();
        $iki = Slug::where('choose','iki')->get();
        $uch = Slug::where('choose','uch')->get();
        $tor = Slug::where('choose','tor')->get();

     $market = Slug::all();

        return view('site.services',compact('market','bir','iki','uch','tor'));


    }

 
}
