<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\CotizacionesExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Cotizacion;
use App\Formulario;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $cotizaciones = Cotizacion::join('formulario', 'formulario.codigo_cotizacion', '=', 'cotizaciones.codigo')
                                    ->orderBy('formulario.created_at', 'desc')
                                    ->paginate(10);

        return view('home', compact('cotizaciones'));
    }

    public function export() 
    {
        return Excel::download(new CotizacionesExport, 'datos.xlsx');
    }
}
