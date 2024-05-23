<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use App\Models\User;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener el valor de búsqueda del formulario
        $search = $request->input('search');

        // Construir la consulta inicial con todos los usuarios
        $query = User::query();
        $idUser = User::select('id');

        $departamentos = User::select('departamento')
        ->distinct()
        ->pluck('departamento');
        $total = $query->count();

        // Aplicar el filtro si hay un término de búsqueda por departamento
        if ($search) {
            $query->where('departamento', 'LIKE', "%{$search}%");
        }
        $departmentName = ucfirst($search);
        // Paginar los resultados
        $perPage = request()->input('perPage', 10); // Obtén el parámetro 'perPage' de la solicitud o usa un valor predeterminado (en este caso, 10)

        $employees = $query->paginate($perPage);
        return view('departments.index', compact('employees', 'search', 'departmentName','departamentos', 'idUser'));
   }

   public function filterUsers(Request $request)
   {
       // Capturar el valor del select
       $departmentName = $request->input('department');

       // Filtrar usuarios por el departamento seleccionado
       $users = User::where('departamento', $departmentName)->paginate(10);

       // Pasar datos a la vista
       return view('departments.index', compact('users', 'departmentName'));
   }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamentos $departamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('departments.edit', ['employee' => $user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request -> validate([
            'departamento'=> ['required','string','max:255'],
        ]);
       $user->update($validate);
       return to_route('departments.index')->with('success', 'Departamento de Empleado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUsers($departmentName)
    {
        $affected = User::where('departamento', $departmentName)->delete();

        return redirect()->route('departments.index')->with('success', 'Departamento eliminado correctamente junto con sus usuarios.');
    }
}
