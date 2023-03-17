<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;

class ExportFilesController extends Controller
{
    //
    public function view(Request $request){
        return $this->Export($request);
    }
    private function Export($request ){
//        $pdfView = file_get_contents(storage_path('app/Form9A_Table.php'));
        $pdfView = $request -> input('html');


        $pdf = new Dompdf();
        $pdf->loadHTML($pdfView);
        $pdf -> setPaper('A4',"portrait");
        $pdf ->render();
//        $pdfOutput = $pdf->output();



        return $pdf->stream('table.pdf');
    }
}
