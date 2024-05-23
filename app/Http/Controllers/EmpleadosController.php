<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class EmpleadosController extends Controller
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
        $total = $query->count();

        // Aplicar el filtro si hay un término de búsqueda
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('departamento', 'LIKE', "%{$search}%");
        }
        $total = $query->count();
        // Paginar los resultados
        $perPage = request()->input('perPage', 10); // Obtén el parámetro 'perPage' de la solicitud o usa un valor predeterminado (en este caso, 10)

        $employees = $query->paginate($perPage);
        return view('employees.index', compact('employees', 'search', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validación de los datos del formulario
       $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    // Crear un nuevo usuario en la base de datos
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('employees.index')->with('success', 'Usuario creado exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('employees.edit', ['employee' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request -> validate([
            'name'=> ['required','string','max:255'],
            'email'=> ['required','string','max:255'],
        ]);
       $user->update($validate);
       return to_route('employees.index')->with('success', 'Empleado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('employees.index')->with('success','Empleado Eliminado exitosamente');
    }
}
