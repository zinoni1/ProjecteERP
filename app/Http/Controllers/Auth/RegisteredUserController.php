<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:usuari,admin,venta'],
            'imagen' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();
            
            // Intenta guardar la imagen en el almacenamiento
            try {
                $rutaImagen = Storage::putFileAs('public/Media', $imagen, $nombreImagen);
            } catch (\Exception $e) {
                // Si hay un error al guardar la imagen, muestra un mensaje de error
                return redirect()->back()->withInput()->withErrors(['imagen' => 'Error al guardar la imagen. Inténtalo de nuevo.']);
            }
        } else {
            $nombreImagen = null;
        }

        // Intenta crear el usuario con la imagen
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'ruta' => $nombreImagen,
            ]);
        } catch (\Exception $e) {
            // Si hay un error al crear el usuario, muestra un mensaje de error
            return redirect()->back()->withInput()->withErrors(['general' => 'Error al crear el usuario. Inténtalo de nuevo.']);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}