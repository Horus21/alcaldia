@props(['name', 'email', 'departamento', 'created_at', 'id'])
<div x-data="{ open: false }">
    <!-- Botón para abrir el modal -->
    <button @click="open = true">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
    </button>


    <!-- Modal -->
    <div x-show="open" class="fixed z-50 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <!-- Fondo oscuro del modal -->
            <div class="fixed inset-0 bg-black opacity-50"></div>

            <!-- Contenedor del modal -->
            <div class="bg-white rounded-lg p-8 max-w-md w-full relative z-50">
                <!-- Encabezado del modal -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">Detalle de usuario</h2>
                    <!-- Botón para cerrar el modal -->
                    <button @click="open = false" class="text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Contenido del modal -->
                <p> <b>id:  </b>{{ $id }}</p>
                <p> <b>Nombre: </b> {{ $name }}</p>
                <p> <b>Email: </b> {{ $email }}</p>
                <p> <b>Dpto: </b> {{ $departamento }}</p>
                <p> <b>Creacion: </b>{{ $created_at }}</p>

            </div>
        </div>
    </div>
</div>

<!-- Configuración de Alpine.js (si no está incluido por defecto) -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.min.js" defer></script>
