<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\VentaPropuesta;
use Illuminate\Http\RedirectResponse;
use App\Models\VentaDetalle;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class IndexController extends Controller
{
    public function showLastUsersAndGraph(): View
    {
        // Obtener los datos de las últimas 5 compras
        $user = Auth::user(); // O cualquier otra forma de obtener el usuario actual

        $ultimasCompras = Compra::latest()->take(5)->get();

        $ultimasVentas = VentaPropuesta::latest()->take(5)->get();
        $users = User::latest()->take(6)->get();

        // Obtener datos de ventas
        $totalVentas = VentaDetalle::sum('PrecioUnitario');

        // Obtener datos de compras
        $totalCompras = Compra::sum('PrecioTotal');

        // Calcular total
        $total = $totalVentas + $totalCompras;
        if ($total == 0) {
            $porcentajeVentas = 0;
            $porcentajeCompras = 0;
        } else {
            // Calcular porcentajes
            $porcentajeVentas = ($totalVentas / $total) * 100;
            $porcentajeCompras = ($totalCompras / $total) * 100;
        }
        // Calcular balance
        $balance = $totalVentas - $totalCompras;

        // Puedes pasar estos valores a tu vista para renderizar la gráfica y las últimas compras
        return view('index', compact('user','ultimasVentas','ultimasCompras', 'users', 'porcentajeVentas', 'porcentajeCompras', 'totalVentas', 'totalCompras', 'balance'));
    }
}