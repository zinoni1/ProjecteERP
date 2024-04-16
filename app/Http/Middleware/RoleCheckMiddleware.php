<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheckMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        
        // Si el usuario es admin, permitir acceso a todas las rutas
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Si el usuario no es admin, pero es usuari, restringir acceso a rutas de crear
        if ($user->role === 'usuari' && ($request->is('productes/create') || $request->routeIs('productes.show') || $request->is('crearCategorias') || $request->is('clientes/create')|| $request->is('personal')|| $request->is('ventas/create')|| $request->is('compras/create')|| $request->is('venedors/create'))) {
            return redirect()->route('error')->with('error', 'No tienes permiso para acceder a esta página');
        }
        if ($user->role === 'venta' && ($request->is('producte')  ||  $request->is('productes')  || $request->is('products')  || $request->is('personal') || $request->is('clientes')|| $request->is('venedors')|| $request->is('facturas')|| $request->is('compras'))){
            return redirect()->route('errorVenta')->with('error', 'No tienes permiso para acceder a esta página');
        }
                
        
        // En cualquier otro caso, permitir acceso a todas las rutas
        return $next($request);
    }
}
