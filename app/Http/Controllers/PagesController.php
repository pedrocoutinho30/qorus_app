<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\TextCard;
use TCG\Voyager\Facades\Voyager;

class PagesController extends Controller
{
    //


    public function index()
    {

        //obter idioma do setLocale
        $lang = app()->getLocale();

        if (!in_array($lang, ['pt', 'en'])) {
            abort(404);
        }

        $menus = Page::where('is_menu', 1)->orderBy('menu_order', 'asc')->get();
        if ($lang == 'pt') {
            $slug = '/';
        } else {
            $slug = '/en';
        }

        $page = Page::whereTranslation('slug', $slug)->firstOrFail();
        return view('frontend.pages.home', compact('menus', 'lang', 'page'));
    }
    public function show($lang = 'pt', $slug = '')
    {
        if (!in_array($lang, ['pt', 'en'])) {
            abort(404);
        }

        // Cache para os menus
        $menus = cache()->remember("menus_{$lang}", 60 * 60, function () {
            return Page::where('is_menu', 1)->get();
        });

        // Se o slug for nulo, redireciona para a página inicial do idioma
        if (is_null($slug)) {
            return view('frontend.homepage', compact('menus', 'lang'));
        }

        // Cache para a página
        $page = cache()->remember("page_{$lang}_{$slug}", 60 * 60, function () use ($slug) {
            return Page::whereTranslation('slug', $slug)->firstOrFail();
        });

        // Cache para textos adicionais, se aplicável
        if ($page->slug == 'contactos') {
            $otherTexts = cache()->remember("otherTexts_{$lang}_contactos", 60 * 60, function () use ($page) {
                return TextCard::where('page_id', $page->id)->orderBy('order', 'asc')->get();
            });
            return view('frontend.pages.contacts', compact('menus', 'lang', 'page', 'otherTexts'));
        } elseif ($page->slug == 'sobre-a-qorus') {
            return view('frontend.pages.about', compact('menus', 'lang', 'page'));
        } elseif ($page->slug == 'servicos') {
            $otherTexts = cache()->remember("otherTexts_{$lang}_servicos", 60 * 60, function () use ($page) {
                return TextCard::where('page_id', $page->id)->orderBy('order', 'asc')->get();
            });
            return view('frontend.pages.services', compact('menus', 'lang', 'page', 'otherTexts'));
        } elseif ($page->slug == 'inovacao-e-sustentabilidade') {
            $otherTexts = cache()->remember("otherTexts_{$lang}_inovacao", 60 * 60, function () use ($page) {
                return TextCard::where('page_id', $page->id)->orderBy('order', 'asc')->get();
            });
            return view('frontend.pages.inovation', compact('menus', 'lang', 'page', 'otherTexts'));
        }

        return view('frontend.pages.home', compact('menus', 'lang', 'page'));
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
