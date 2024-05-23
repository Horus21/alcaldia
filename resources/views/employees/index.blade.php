<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class=" p-4 mr-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('employees') }}
                </h2>
            </div>

        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-sky-100	 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Contenido de la card -->

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <div class="flex-row">
                            <form method="GET" action="{{ route('employees.index') }}" class="mb-4" id="searchForm">
                                <div class="input-group">
                                    <x-text-input type="text" id="searchInput" name="search" class="form-control w-80"
                                        placeholder="Buscar por nombre o departamento" value="{{ $search }}" autocomplete="off" />
                                    <div class="input-group-append mt-3">
                                        <x-primary-button class="btn btn-primary" type="submit">Buscar</x-primary-button>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('employees.create') }}"class=" mb-4 flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                  </svg>
                                Crear usuario
                            </a>
                            @if ($total != 0)

                                <x-table :employees="$employees" class="justify-center relative" />
                            @else
                                <div class="alert alert-warning">No se encontraron resultados para la búsqueda
                                    "{{ $search }}".
                                </div>
                            @endif


                            <div class="flex-row">
                                <div class="p-4 mr-4">
                                    <div class="d-flex justify-content-center">
                                        {{ $employees->appends(['search' => $search])->links() }}
                                    </div>
                                </div>
                                <div class=" p-4">
                                    <div class="flex justify-end mb-4">
                                        <form action="{{ route('employees.index') }}" method="GET">
                                            <label for="perPage" class="mr-2">Mostrar por página:</label>
                                            <x-text-input-select class="px-6 py-1 border border-gray-300 rounded"
                                                name="perPage" id="perPage" onchange="this.form.submit()">
                                                <option value="10"
                                                    {{ request()->input('perPage') == 10 ? 'selected' : '' }}>10
                                                </option>
                                                <option value="15"
                                                    {{ request()->input('perPage') == 15 ? 'selected' : '' }}>15
                                                </option>
                                                <option value="20"
                                                    {{ request()->input('perPage') == 20 ? 'selected' : '' }}>20
                                                </option>
                                            </x-text-input-select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');

        // Si el campo de búsqueda está vacío, enviar el formulario para cargar todos los registros
        searchInput.addEventListener('blur', function() {
            if (searchInput.value === '') {
                searchForm.submit();
            }
        });
    </script>
</x-app-layout>