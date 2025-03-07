<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de clientes') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-950 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Olá <strong>{{ Auth::user()->name }}</strong></p>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="p-2 bg-gray-900 rounded-lg mb-3">
                        {{ $clientes->links() }}
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left bg-gray-800">
                            <tr>
                                <th class="p-2">Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Usuário</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ( $clientes as $cliente )
                                <tr class="hover:bg-gray-800">
                                    <td class="p-2">{{ $cliente->nome }}</td>
                                    <td class="p-2">{{ $cliente->email }}</td>
                                    <td class="p-2">{{ $cliente->telefone }}</td>
                                    <td class="p-2">{{ $cliente->user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
