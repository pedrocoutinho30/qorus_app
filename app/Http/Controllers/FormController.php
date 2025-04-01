<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // Salvar os dados no modelo Form
        $form = new Form();
        $form->name = $validatedData['name'];
        $form->email = $validatedData['email'];
        $form->phone = $validatedData['phone'];
        $form->message = $validatedData['message'];
        $form->save();

        // Redirecionar com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Formulário enviado com sucesso!');
    }
}