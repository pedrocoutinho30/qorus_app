<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
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


Route::get('/', function () {
    $lang = app()->getLocale();
    if ($lang == 'pt') {
        return redirect('/pt');
    } else {
        return redirect('/en');
    }
});


Route::get('/{lang}', 'App\Http\Controllers\PagesController@index')->name('page.home.pt');
Route::get('/{lang}', 'App\Http\Controllers\PagesController@index')->name('page.home.en');


// Rota para mudar o idioma
Route::get('/change-language/{lang}/{slug}', 'App\Http\Controllers\LanguageController@changeLanguage')->name('change-language');

Route::get('/{lang}/{contact}', 'App\Http\Controllers\PagesController@contacts')->where('lang', 'pt|en')->where('contact', 'contactos|contacts')->name('page.contacts');
Route::get('/{lang}/{policy}', 'App\Http\Controllers\PagesController@privacy')->where('lang', 'pt|en')->where('policy', 'politica-de-privacidade|privacy-policies')->name('page.privacy');
Route::get('/{lang}/{terms}', 'App\Http\Controllers\PagesController@terms')->where('lang', 'pt|en')->where('terms', 'termos-e-condicoes|terms-and-conditions')->name('page.terms');


// Route::get('/{lang}/contactos', 'App\Http\Controllers\PagesController@contacts')->where('lang', 'pt')->name('page.contacts');
// Route::get('/{}', 'App\Http\Controllers\PagesController@index')->name('home');


Route::get('/{lang}/{slug}',  'App\Http\Controllers\PagesController@show')->where('lang', 'pt|en')->name('page.show');

// Route::get('/{lang}/{slug}',  function () {
// dd("TPª");
// })->where('lang', 'pt|en')->where('slug', 'contactos|contacts')->name('page.contacts');




Route::group(['prefix' => 'qorus-bo'], function () {
    Voyager::routes();
});
