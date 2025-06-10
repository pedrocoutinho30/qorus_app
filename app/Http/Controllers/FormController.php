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
        $emailContent = '
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; padding: 20px; }
            .content { background: #fff; padding: 20px; border-radius: 8px; }
            h2 { color: #333; }
            p { margin: 0 0 10px; }
        </style>
    </head>
    <body>
        <div class="content">
            <h2>Nova submissão de formulário no site</h2>
            <p><strong>Nome:</strong> ' . e($validatedData['name']) . '</p>
            <p><strong>Email:</strong> ' . e($validatedData['email']) . '</p>
            <p><strong>Telefone:</strong> ' . e($validatedData['phone']) . '</p>
            <p><strong>Mensagem:</strong></p>
            <p>' . nl2br(e($validatedData['message'])) . '</p>
        </div>
    </body>
    </html>
';

        // Enviar o e-mail

        Mail::html($emailContent, function ($message) use ($validatedData) {
            $message->to('info@qorusgroup.com')
                ->subject('Novo Formulário Submetido')
                ->from($validatedData['email'], $validatedData['name']);
        });

        // Enviar o e-mail para o destinatário
        // Aqui voce pode usar a biblioteca de e-mail do Laravel para enviar o e-mail
    }
}
