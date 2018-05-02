<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('welcome');
        return $pdf->download( bcrypt(time()).'.pdf');
    }    
}
