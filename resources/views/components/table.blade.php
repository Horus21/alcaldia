<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200" id="example">
        <thead>
            <tr class="bg-gray-100">
                <th
                    class="border-b border-gray-200 px-6 py-3 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                    ID</th>
                <th
                    class="border-b border-gray-200 px-6 py-3 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                    Nombre</th>
                <th
                    class="border-b border-gray-200 px-6 py-3 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                    Departamento</th>
                <th
                    class="border-b border-gray-200 px-6 py-3 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                    Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($employees as $employee)
                <tr>
                    <td class="border-b border-gray-200 px-6 py-4 whitespace-no-wrap">{{ $employee['id'] }}</td>
                    <td class="border-b border-gray-200 px-6 py-4 whitespace-no-wrap">{{ $employee['name'] }}
                        @if ($employee->created_at != $employee->updated_at)
                            <small class="text-sm text-gray-600 dark:text-gray-400">&middot; {{ __('edited') }}</small>
                        @endif
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 whitespace-no-wrap">{{ $employee['departamento'] }}
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 whitespace-no-wrap">


                        <div class="flex justify-between">
                            <div class=" p-4 mr-4">
                                 <x-modal2 :id="$employee['id']" :name="$employee['name']" :departamento="$employee['departamento']" :email="$employee['email']"  :created_at="$employee['created_at']" />
                            </div>
                            <div class=" p-4 mr-4">
                                <a href="{{ route('employees.edit', $employee) }}">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                            </div>
                            <div class=" p-4">
                                <form method="POST" action="{{ route('employees.destroy', $employee) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>
