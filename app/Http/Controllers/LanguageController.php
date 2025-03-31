<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class LanguageController extends Controller
{
    // public function changeLanguage($lang, $slug)
    // {
    //     // Verifica se o idioma é suportado
    //     if (!in_array($lang, ['pt', 'en'])) {
    //         abort(404);
    //     }

    //     if ($slug == 'home') {

    //         return redirect('/' . $lang);
    //         // return redirect()->route('page.home', ['lang' => $lang]);
    //     }

    //     if ($slug == 'contacts' || $slug == 'contactos') {

    //         if ($lang == 'pt') {
    //             $slug = 'contactos';
    //         } else {
    //             $slug = 'contacts';
    //         }
    //         return redirect()->route('page.contacts', ['lang' => $lang, 'contact' => $slug]);
    //     }

    //     $page = Page::whereTranslation('slug', $slug)->firstOrFail();
    //     // Obtém o slug traduzido para o novo idioma
    //     $translatedSlug = $page->getTranslatedAttribute('slug', $lang);
    //     $slug = $page->getTranslatedAttribute('slug', $lang);


    //     // Redireciona para a nova rota com o idioma selecionado
    //     return redirect()->route('page.show', ['lang' => $lang, 'slug' => $translatedSlug]);
    // }

    public function changeLanguage($lang, $slug = null)
    {
        // Salva o idioma na sessão
        if (!in_array($lang, ['pt', 'en'])) {
            abort(404);
        }
    
        // Salva o idioma na sessão
        session(['locale' => $lang]);
    
        // Define o idioma no aplicativo
        app()->setLocale($lang);
    
        // Se o slug for nulo ou for "home", redireciona para a home no idioma selecionado
        if (is_null($slug) || $slug === 'home') {
            
            return redirect($lang === 'en' ? '/en' : '/');
        }
    
        // Verifica se o slug é uma página válida
        $page = Page::whereTranslation('slug', $slug)->first();
        if ($page) {
            // Obtém o slug traduzido para o novo idioma
            $translatedSlug = $page->getTranslatedAttribute('slug', $lang);
    
            // Redireciona para a página traduzida
            return redirect("/$lang/$translatedSlug");
        }
    
        // Caso o slug não seja encontrado, redireciona para a home no idioma selecionado
        return redirect($lang === 'en' ? '/en' : '/');
    }
}
