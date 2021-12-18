<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\AboutCompanyController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SlugController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\GrowthController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\OurServicesController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LacationController;
use App\Http\Controllers\Admin\AnalizController;

use App\Http\Controllers\Admin\ShowroomController;
use App\Http\Controllers\Admin\StartController;

use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;






Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function (){


    require __DIR__.'/auth.php';
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/about', [HomeController::class, 'about'])->name('about');

    Route::get('/services', [HomeController::class, 'services'])->name('services');
    // Route::get('/services{slug}', [SiteController::class, 'index'])->name('site');

    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
});

Route::post('/contact/sendToTg', [HomeController::class, 'sendToTg'])->name('contact.send');



Route::get('/logout', function () {
    return view('site.home');
})->name('logout');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class,'index'])->name('admin');
    Route::resources([
        'admin/start' => StartController::class,
        'admin/services' => ServicesController::class,
        'admin/growth' => GrowthController::class,
        'admin/number' => NumberController::class,
        'admin/company' => CompanyController::class,
        'admin/about' => AboutController::class,
        'admin/aboutus' => AboutUsController::class,
        'admin/aboutcompany' => AboutCompanyController::class,
        'admin/member' => MemberController::class,
        'admin/market' => SlugController::class,
        'admin/ourservices' => OurServicesController::class,
        'admin/contact' => ContactController::class,
        'admin/location' => LacationController::class,
        'admin/showroom' => ShowroomController::class,
        'admin/analiz' => AnalizController::class,
       


    ]);

    Route::post('/admin/start/upload', [StartController::class, 'upload'])->name('admin.start.upload');
    Route::post('/admin/services/upload', [ServicesController::class, 'upload'])->name('admin.services.upload');
    Route::post('/admin/growth/upload', [GrowthController::class, 'upload'])->name('admin.growth.upload');
    Route::post('/admin/number/upload', [NumberController::class, 'upload'])->name('admin.number.upload');
    Route::post('/admin/company/upload', [CompanyController::class, 'upload'])->name('admin.company.upload');
    Route::post('/admin/about/upload', [AboutController::class, 'upload'])->name('admin.about.upload');
    Route::post('/admin/aboutus/upload', [AboutUsController::class, 'upload'])->name('admin.aboutus.upload');
    Route::post('/admin/aboutcompany/upload', [AboutCompanyController::class, 'upload'])->name('admin.aboutcompany.upload');
    Route::post('/admin/member/upload', [MemberController::class, 'upload'])->name('admin.member.upload');
    Route::post('/admin/market/upload', [SlugController::class, 'upload'])->name('admin.market.upload');
    Route::post('/admin/ourservices/upload', [OurServicesController::class, 'upload'])->name('admin.ourservices.upload');
    Route::post('/admin/contact/upload', [ContactController::class, 'upload'])->name('admin.contact.upload');
    Route::post('/admin/location/upload', [LacationController::class, 'upload'])->name('admin.location.upload');
    Route::post('/admin/analiz/upload', [AnalizController::class, 'upload'])->name('admin.analiz.upload');

 
});
