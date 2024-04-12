<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
        $users = User::latest()->take(5)->get();

        // Obtener datos de ventas
        $totalVentas = VentaDetalle::sum('PrecioUnitario');

        // Obtener datos de compras
        $totalCompras = Compra::sum('PrecioTotal');

        // Calcular total
        $total = $totalVentas + $totalCompras;

        // Calcular balance
        $balance = $totalVentas - $totalCompras;

        // Calcular porcentajes
        $porcentajeVentas = ($totalVentas / $total) * 100;
        $porcentajeCompras = ($totalCompras / $total) * 100;

        // Puedes pasar estos valores a tu vista para renderizar la gráfica
        return view('index', compact('users', 'porcentajeVentas', 'porcentajeCompras', 'totalVentas', 'totalCompras', 'balance'));
    }
    
    
}