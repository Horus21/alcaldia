@props(['editUrl', 'deleteUrl'])

<div class="flex space-x-2">
    <!-- Botón de Editar -->
    @csrf @method('PUT')
    <a href="{{ $editUrl }}" class="text-blue-500 hover:text-blue-700">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m6 0l6 6m-6-6l6-6M3 12h6m0 0l-6-6m6 6l-6 6"></path>
        </svg>
    </a>
    <!-- Botón de Eliminar -->
    {{-- <form action="{{ $deleteUrl }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500 hover:text-red-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </form> --}}
</div>
