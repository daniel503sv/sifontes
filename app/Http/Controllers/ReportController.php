<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show()
    {
        $pdf = \App::make('dompdf.wrapper');
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
        $pdf->loadView('report',compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download( bcrypt(time()).'.pdf');
    }

    public function index(){
        $reports = \App\Prestamo::get();
        $data = array();
        foreach( $reports as $report){
            $currentData["user_id"]=$this->getUsername($report->usuario_id);
            $currentData["date"]=$report->fecha_prestamo;
            $currentData["start_time"]=$report->fecha_prestamo;
            $currentData["end_time"]=$report->fecha_devolucion;
            $currentData["resource"]=$this->getDescription($report->equipo_id);
            $currentData["resource_id"]=$this->getCode($report->equipo_id);
            $currentData["grade"]=$this->getGrade($report->usuario_id);
            $currentData["section"]=$this->getSection($report->usuario_id);
            array_push($data, $currentData);
        }
        
        return view('report')->with("data",$data);
    }

    protected function getUsername($user_id)
    {
        $student=\App\Alumno::find($user_id);
        return $student->nombre;
    }

    protected function getDescription($equipo_id)
    {
        $equipo=\App\Equipo::find($equipo_id);
        return $equipo->descripcion;
    }

    protected function getCode($equipo_id)
    {
        $equipo=\App\Equipo::find($equipo_id);
        return $equipo->codigo;
    }
    
    protected function getGrade($user_id)
    {
        $alumno=\App\Alumno::find($user_id);
        $salon =  \App\Salon::find($alumno->salon_id);
        return $salon->grado;
    }

    protected function getSection($user_id)
    {
        $alumno=\App\Alumno::find($user_id);
        $salon =  \App\Salon::find($alumno->salon_id);
        return $salon->seccion;
    }


}
