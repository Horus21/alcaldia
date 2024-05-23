<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="bg-blue-200 p-4 mr-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit Department') }}
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Contenido de la CARD -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('departments.update', $employee->id) }}" >
                        @method('PUT')
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="off" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Departamento -->
                        <div class="mt-4">
                            <x-input-label :value="__('Department')" />
                            <x-text-input-select id="departamento" class="block mt-1 w-full" name="departamento"
                                required autocomplete="off" />
                            <x-input-error :messages="$errors->get('emanpm ruil')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4" type="submit">
                                {{ __('Update') }}
                            </x-primary-button>

                        </div>
                    </form>
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
