<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function view(){
        return $this->ExportToPDF();
    }
    private function ExportToPDF(){
        $pdfView = file_get_contents(storage_path('app/Form9A_Table.php'));
        $pdf = new Dompdf();
        $pdf->loadHTML($pdfView);
        $pdf -> setPaper('A4',"portrait");
        $pdf ->render();

        return $pdf->stream('table.pdf');
    }

}
