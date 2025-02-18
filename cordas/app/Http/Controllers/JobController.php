<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // Retorna a lista de trabalhos para a view
        $jobs = Job::all();
        return view('blog', compact('jobs'));
    }

    public function store(Request $request)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'required|string',
            'portfolio' => 'nullable|url',
        ]);

        // Cria o novo trabalho
        Job::create($validated);

        // Redireciona após o envio
        return redirect()->route('blog')->with('success', 'Trabalho enviado com sucesso!');
    }
}

