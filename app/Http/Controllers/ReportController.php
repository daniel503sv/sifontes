<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('test');
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download( bcrypt(time()).'.pdf');
    }

    public function index(){
        $reports = \App\Prestamo::get();
        $data = array();
        foreach( $reports as $report){
            $currentData["user_id"]=$report->usuario_id??"test";
            $currentData["date"]=$report->fecha_prestamo;
            $currentData["start_time"]=$report->fecha_prestamo;
            $currentData["end_time"]=$report->fecha_devolucion;
            $currentData["resource_id"]=$report->equipo_id;
            array_push($data, $currentData);
        }
        
        return view('report')->with("data",$data);
    }
}
