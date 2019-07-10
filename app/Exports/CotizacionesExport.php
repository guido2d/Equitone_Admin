<?php

namespace App\Exports;

use App\Formulario;
use App\Cotizacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CotizacionesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cotizacion::join('formulario', 'formulario.codigo_cotizacion', '=', 'cotizaciones.codigo')
                ->orderBy('formulario.created_at', 'desc')
                ->select('formulario.codigo_cotizacion','formulario.nombre', 'formulario.email', 'formulario.telefono', 'formulario.comuna', 'cotizaciones.mt2aRevestir', 'formulario.instalador',  'formulario.tiempo_construccion','formulario.created_at')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Nro. Cotización',
            'Nombre',
            'Email',
            'Teléfono',
            'Comuna',
            'Mt2',
            '¿Instalador?',
            'Tiempo Construcción',
            'Fecha de envío',
        ];
    }
}