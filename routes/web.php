<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\FormController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {


//     return view('welcome');
// });


// Route::get('/homepage', function () {

//     return redirect('/');
// });


Route::group(['prefix' => 'qorus-bo'], function () {
    Voyager::routes();
});

// Nova rota para exibir o vídeo
// Route::get('/', function () {
//     return view('frontend.pages.home');
//     // return view('video');
// });


Route::get('/', 'App\Http\Controllers\PagesController@index')->name('page.home.pt');

Route::get('/en', 'App\Http\Controllers\PagesController@index')->name('page.home.en');

// Rota para redirecionar após a escolha do idioma
// Route::post('/choose-language', function (Illuminate\Http\Request $request) {
//     $lang = $request->input('language');
//     return redirect("/$lang");
// });

// Route::get('/{lang}', 'App\Http\Controllers\PagesController@index')->name('page.home.pt');
// Route::get('/{lang}', 'App\Http\Controllers\PagesController@index')->name('page.home.en');




// Rota para mudar o idioma
// Route::get('/change-language/{lang}/{slug}', 'App\Http\Controllers\LanguageController@changeLanguage')->name('change-language');
Route::get('/change-language/{lang}/{slug?}', [App\Http\Controllers\LanguageController::class, 'changeLanguage'])->name('change-language');

Route::get('/{lang}/{slug}', 'App\Http\Controllers\PagesController@show')
    ->where('lang', 'pt|en')
    ->name('page.show');


Route::post('/submit-form', [FormController::class, 'store'])->name('form.submit');
// Route::get('/{lang}/{contact}', 'App\Http\Controllers\PagesController@contacts')->where('lang', 'pt|en')->where('contact', 'contactos|contacts')->name('page.contacts');
// Route::get('/{lang}/{policy}', 'App\Http\Controllers\PagesController@privacy')->where('lang', 'pt|en')->where('policy', 'politica-de-privacidade|privacy-policies')->name('page.privacy');
// Route::get('/{lang}/{terms}', 'App\Http\Controllers\PagesController@terms')->where('lang', 'pt|en')->where('terms', 'termos-e-condicoes|terms-and-conditions')->name('page.terms');

// Route::get('/{lang}/{slug}',  'App\Http\Controllers\PagesController@show')->where('lang', 'pt|en')->name('page.show');
