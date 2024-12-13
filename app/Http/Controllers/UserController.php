<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        // Usando Eloquent para buscar os usuários
        return view('users.index', [
            'users' => User::orderBy('name')->paginate(5)
        ]);
    }

    public function edit($id)
    {
        // Buscando o usuário pelo ID usando Eloquent
        return view('users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        // Atualizando o usuário com os dados do request
        User::findOrFail($id)->update($request->all());
        
        // Redirecionando para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }
}
