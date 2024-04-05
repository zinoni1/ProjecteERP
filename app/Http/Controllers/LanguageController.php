<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function cambiarIdioma($idioma)
    {
        session(['idioma' => $idioma]);
        return redirect()->back();
    }
}
