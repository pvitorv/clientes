<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-950 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                </div>

                <div class="p-6 text-gray-100">

                    <div class="p-2 bg-gray-900 rounded-lg mb-3">
                        {{ $users->links() }}
                    </div>

                    <table class="table-auto w-full">

                        <thead class="text-left bg-gray-900">
                            <tr>
                                <th class="text-center">Nivel</th>
                                <th class="p-3">Nome</th>
                                <th>E-mail</th>
                                <th>Data de cadastro</th>

                            @can('level')
                                <th class="text-center">Ações</th>
                            @endcan


                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-900">
                                    <td class="text-center">
                                        @if($user->level == 'admin')
                                            <i class="fa-solid fa-unlock-keyhole"></i>
                                        @else
                                            <i class="fa-solid fa-user"></i>
                                        @endif
                                    </td>
                                    <td class="p-2">{{ $user->name }}</td>
                                    <td class="p-2">{{ $user->email }}</td>
                                    <td class="p-2">{{ $user->created_at }}</td>

                                @can('level')
                                    <td class="text-center">
                                        <a href="{{ route('user.edit', $user->id) }}">Editar</a>
                                    </td>
                                @endcan

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

