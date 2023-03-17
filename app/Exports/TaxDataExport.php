<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TaxDataExport implements FromView, ShouldAutoSize, WithStyles, WithEvents, WithColumnWidths
{
    private $data;

    function __construct($data){
        $this->data = $data;
    }
    public function view():View
    {
        return view('pdf.Excel', [
            'data' => $this->data
        ]);
    }

    public function styles(Worksheet $sheet): array
    {

        $styleArray = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],

            // 'borders' => [
            //     'allBorders' => [
            //         'borderStyle' => Border::BORDER_THIN,
            //         'color' => ['argb' => '000000'],
            //     ],
            
        ];

        $sheet->getStyle('A7:O22')->applyFromArray($styleArray);
        $sheet->getStyle('F1:J1')->applyFromArray($styleArray);
        
        return [
        // Style the row as bold text.
        1    => ['cell'=>['border'=>false]],
        7    => ['font' => ['bold' => true,'size'=>14,'family'=>'verdana'],'cell'=>['border'=>true], 'alignment'=>['center'=>true,'wrap-text'=>true]],
        22    => ['font' => ['bold' => true,'size'=>14,'family'=>'verdana']],
    ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25, 
            'I' => 25, 
            'J' => 25, 
        ];
    }

    
    public function registerEvents(): array
    {

        return [];
    }
}
