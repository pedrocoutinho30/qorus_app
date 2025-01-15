<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class LanguageController extends Controller
{
    public function changeLanguage($lang, $slug)
    {
        // Verifica se o idioma é suportado
        if (!in_array($lang, ['pt', 'en'])) {
            abort(404);
        }

        if ($slug == 'home') {

            return redirect('/' . $lang);
            // return redirect()->route('page.home', ['lang' => $lang]);
        }

        if ($slug == 'contacts' || $slug == 'contactos') {

            if ($lang == 'pt') {
                $slug = 'contactos';
            } else {
                $slug = 'contacts';
            }
            return redirect()->route('page.contacts', ['lang' => $lang, 'contact' => $slug]);
        }

        $page = Page::whereTranslation('slug', $slug)->firstOrFail();
        // Obtém o slug traduzido para o novo idioma
        $translatedSlug = $page->getTranslatedAttribute('slug', $lang);
        $slug = $page->getTranslatedAttribute('slug', $lang);


        // Redireciona para a nova rota com o idioma selecionado
        return redirect()->route('page.show', ['lang' => $lang, 'slug' => $translatedSlug]);
    }
}
