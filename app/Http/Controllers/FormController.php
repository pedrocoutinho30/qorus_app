<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'regex:/^\d{9,12}$/'],
            'message' => 'required|string',
        ], [
            'phone.regex' => 'O número de telefone deve conter entre 9 e 12 dígitos.',
        ]);

        // Salvar os dados no modelo Form
        $form = new Form();
        $form->name = $validatedData['name'];
        $form->email = $validatedData['email'];
        $form->phone = $validatedData['phone'];
        $form->message = $validatedData['message'];
        $form->save();

        $this->sendEmail($validatedData);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Formulário enviado com sucesso!');
    }

    public function sendEmail($validatedData)
    {
        $emailContent = "Novo formulário submetido:\n\n";
        $emailContent .= "Nome: {$validatedData['name']}\n";
        $emailContent .= "Email: {$validatedData['email']}\n";
        $emailContent .= "Telefone: {$validatedData['phone']}\n";
        $emailContent .= "Mensagem: {$validatedData['message']}\n";

        // Enviar o e-mail
        Mail::raw($emailContent, function ($message) use ($validatedData) {
            $message->to('destinatario@example.com') // Substitua pelo destinatário real
                ->subject('Novo Formulário Submetido')
                ->from($validatedData['email'], $validatedData['name']);
        });
        // Enviar o e-mail para o destinatário
        // Aqui voce pode usar a biblioteca de e-mail do Laravel para enviar o e-mail
    }
}
