<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-950 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Olá  <strong>{{ Auth::user()->name }}</strong></p>
                    <p class="mb-4">
                        Exibindo detalhes do cliente {{ $cliente->nome }}
                    </p>
                    <p>
                        <a href="{{route('meus.clientes',Auth::user()->id)}}"class="bg-blue-500 text-white p-2 rounded ">Meus clientes</a>
                        <a href="{{route('cliente.edit', $cliente->id)}}"class="bg-green-500 text-white p-2 ml-2  mr-2 rounded ">Editar</a>
                        <a href="{{ route('confirma.delete', $cliente->id) }}"class="bg-red-500 text-white p-2 rounded ">Excluir</a>
                    </p>
                </div>

                <div class="p-6 text-gray-100">
                    <p><strong>Nome: </strong>{{ $cliente->nome }}</p>
                    <p><strong>E-mail: </strong>{{ $cliente->email }}</p>
                    <p><strong>Telefone: </strong>{{ $cliente->telefone }}</p>
                    <p><strong>Empresa: </strong>{{ $cliente->empresa }}</p>
                    <p><strong>Telefone comercial: </strong>{{ $cliente->tel_comercial }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
