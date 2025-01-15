<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    //


    public function index($lang = 'pt')
    {
        if (!in_array($lang, ['pt', 'en'])) {
            abort(404);
        }
        $menus = Page::where('is_menu', 1)->orderBy('menu_order', 'asc')->get();
        return view('frontend.homepage', compact('menus', 'lang'));
    }
    public function show($lang = 'pt', $slug = '')
    {

        if (!in_array($lang, ['pt', 'en'])) {
            abort(404);
        }

        $menus = Page::where('is_menu', 1)->get();


        // Se o slug for nulo, redireciona para a página inicial do idioma
        if (is_null($slug)) {
            return view('frontend.homepage', compact('menus', 'lang'));
        }


        $page = Page::whereTranslation('slug', $slug)->firstOrFail();


        return view('frontend.page', compact('page', 'lang', 'menus'));
    }

    public function contacts($lang = 'pt')
    {
        $menus = Page::where('is_menu', 1)->get();


        return view('frontend.contacts', compact('lang', 'menus'));
    }

    public function privacy($lang = 'pt', $privacy = 'privacy-policies')
    {
        $page = Page::whereTranslation('slug', $privacy)->firstOrFail();

        return view('frontend.privacy', compact('lang', 'page'));
    }
    public function terms($lang = 'pt', $terms = 'terms-and-conditions')
    {
        $page = Page::whereTranslation('slug', $terms)->firstOrFail();
        return view('frontend.terms', compact('lang', 'page'));
    }
}
