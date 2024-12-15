<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User; // Importação correta da classe User
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ClienteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('can:level')->only('index');
    }

    public function meus_clientes(User $id)
    {
        $user = User::where('id', $id->id)->first();
        // Adicione mais lógica aqui, se necessário
        $clientes = $user->customers()->get();

        return view('clientes.meus_clientes',[
            'clientes' => $clientes
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientes.index', [
            'clientes' => Cliente::orderBy('nome')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->user_id       = $request->user()->id;
        $cliente->nome          = $request->nome;
        $cliente->email         = $request->email;
        $cliente->telefone      = $request->tel; // Certifique-se de usar 'tel' ou 'telefone' consistentemente
        $cliente->empresa       = $request->empresa;
        $cliente->tel_comercial = $request->tel_comercial;
        $cliente->save(); // Salva o modelo no banco de dados

        return redirect()->route('cliente.create')->with('msg', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show',['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}





