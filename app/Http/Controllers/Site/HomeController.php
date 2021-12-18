<?php

namespace App\Http\Controllers\Site;
use App\Models\Start;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutCompany;
use App\Models\AboutUs;
use App\Models\Analiz;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Growth;
use App\Models\Member;
use App\Models\MembersCompany;
use App\Models\Number;
use App\Models\OurServices;
use App\Models\Services;
use App\Models\Loacation;
use App\Models\Showroom;
use App\Models\Slug;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Telegram\Bot\Laravel\Facades\Telegram;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $growth = Growth::all();
        $start = Start::all();
        $services = Services:: all();
        $number = Number::all();
        $company = Company::all();
        $about = About::all();
         return view('site.index',compact('start','services','growth','number','company','about'));
    }

   

    public function sendToTg(Request $request) {
        $this->validate($request, ['phone' => 'required|min:8']);

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001580519302'),
            'parse_mode' => 'HTML',
            'text' => "<b>Новая обращение!</b>\n"
                . "\n"
                . "<b>Имя клиента</b>: $request->name\n"
                . "<b>Тел номер</b>: $request->phone\n"
                . "<b>Категория</b>: $request->subject\n"
                . "<b>Сообщение</b>: $request->message\n"
        ]);
        Alert::success('Обращение принято', 'Скоро мы свяжемся с вами');
        return redirect()->back();



    

    }



    public function about()
    {

        $aboutus = AboutUs::all();
        $aboutcompany = AboutCompany::all();
        $member = Member::all();
       $growth = Growth::all();
       $number = Number::all();
       $about = About::all();


        return view('site.about',compact('aboutus','aboutcompany','member','growth','number','about'));


    }


    public function services()
    {

        $bir = Slug::where('choose','bir')->get();
        $iki = Slug::where('choose','iki')->get();
        $uch = Slug::where('choose','uch')->get();
        $tor = Slug::where('choose','tor')->get();
        $ourservices = OurServices ::all();
     $market = Slug::all();
     $analiz = Analiz::all();

        return view('site.services',compact('ourservices','analiz') );


    }




    public function contact()
    {
        $shoowroom = Showroom::all();
        $contact = Contact::all();
    
        $location = Loacation::all();
        return view('site.contact',compact('contact','location','shoowroom'));

    }













    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
