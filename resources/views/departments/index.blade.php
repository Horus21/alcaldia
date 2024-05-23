<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-sky-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-4">
                        <form method="GET" action="{{ route('departments.index') }}" class="mb-4" id="searchForm">
                            <div class="input-group">
                                <x-input-label for="search" :value="__('Introduzca el departamento para ver los usuarios relacionados')" />
                                <x-text-input type="text" id="searchInput" name="search" class="form-control w-80"
                                    placeholder="Buscar departamento" value="{{ $search }}" autocomplete="off" />
                                <div class="input-group-append mt-3">
                                    <x-primary-button class="btn btn-primary" type="submit">Buscar</x-primary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if ($employees == '')



                        <div class="container mx-auto mt-5">
                            <h1 class="text-2xl font-bold mb-5">Empleados en el Departamento de: {{ $departmentName }}
                            </h1>
                            @dump($idUser)
                            @if ($employees->count() > 0)
                                <div class="flex justify-between">
                                    <div class=" p-4">
                                        <form method="POST"
                                            action="{{ route('departments.deleteUsers', $departmentName) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"onclick="return confirm('¿Estás seguro de que deseas eliminar el departamento de {{ $departmentName }} con todos sus usuarios?');">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                                Eliminar Departamento
                                            </button>
                                        </form>

                                    </div>

                                </div>
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Departamento</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Acciones</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $employee->departamento }}
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class=" p-4 mr-4">
                                                        <a href="{{ route('departments.edit', $employee) }}">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $employees->links() }}
                                </div>
                            @else
                                <div class="text-gray-500">No hay empleados en este departamento.</div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/departamentos')
                .then(response => response.json())
                .then(data => {
                    const departamentoSelect = document.getElementById('departamento');
                    data.forEach(departamento => {
                        let option = document.createElement('option');
                        option.text = departamento.name;
                        departamentoSelect.appendChild(option);
                    });
                });
        });
    </script>
</x-app-layout>
