<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('created_at', 'desc')->paginate(4);
        return view('indexAllCLientes', compact('clientes'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formCliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clientes,email',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255',
        ]);

        Cliente::create([
            'Nombre' => $request->nombre,
            'Apellido' => $request->apellido,
            'Email' => $request->email,
            'Telefono' => $request->telefono,
            'Direccion' => $request->direccion,
            'Poblacion' => $request->poblacion,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('showCliente', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clientes,email,'.$cliente->id,
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255',
        ]);

        $cliente->update([
            'Nombre' => $request->nombre,
            'Apellido' => $request->apellido,
            'Email' => $request->email,
            'Telefono' => $request->telefono,
            'Direccion' => $request->direccion,
            'Poblacion' => $request->poblacion,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }

    public function mostrarTodos()
    {
        $clientes = Cliente::all();
        return view('indexAllClientes', ['clientes' => $clientes]);
    }
    public function graficPoblacio()
    {
        // Obtener la cantidad de clientes por población
        $poblacionCount = Cliente::select('Poblacion', DB::raw('count(*) as total'))
            ->groupBy('Poblacion')
            ->get();
    
        // Preparar los datos para el gráfico
        $labels = $poblacionCount->pluck('Poblacion')->toArray();
        $data = $poblacionCount->pluck('total')->toArray();
    
        return view('graficPoblacio', compact('labels', 'data'));
    }
    

}
