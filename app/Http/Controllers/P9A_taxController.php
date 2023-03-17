<?php

namespace App\Http\Controllers;


use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Exports\TaxDataExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class P9A_taxController extends Controller
{
    //
    public function index(){
        $data = $this->getP9A_taxData();
        return view('Home', compact('data'));
    }
    private function getP9A_taxData(){
        $file_url = storage_path('app/P9A_taxData.json');
        if (!file_exists($file_url)){
            $data = [
                'employeeName' => '',
                'Employee_other_Names' => '',
                'employeeKraPin' => '',
                'employerName' => '',
                'employerKraPin' => '',
                'periodCovered' => '',

                'basicSalary' => '',
                'overtimePay' => '',
                'benefits' => '',
                'non_cash_benefits' => '',
                'grossPay' => '',
                'nssf_No' => '',
                'nhif_No' => '',
                'payee' => '',
                'E1'=>'',
                'E2'=>'',
                'E3'=>'',
                'F'=>'',
                'G'=>'',
                'H'=>'',
                'TaxCharged'=>'',
                'PersonalRelief'=>'',
                'InsuranceRelief'=>'',
                'Months' => '',
                'taxable_pay' => '',
                'total_relief'=> '',
                'totalDeductions' => '',
                'netPay' => '',
            ];

            $this->SaveP9A_taxData($data);
        }

        $dataval = json_decode(file_get_contents($file_url,true));
        // Perform the calculations based on the data

        $employerName = $dataval->employer_name;
        $employerKraPin = $dataval->employer_pin;
        $employer_address = $dataval->employer_address;
        $employeeName = $dataval->employee_name;
        $employeeKraPin = $dataval->employee_id;
        $employee_id_no = $dataval->employee_id_no;
        $employee_date_of_birth = $dataval->employee_date_of_birth;
        $employee_designation = $dataval->employee_designation;
        $employee_date_of_employment = $dataval->employee_date_of_employment;
        $periodCovered = $dataval->period_covered;
        $tax_period = $dataval->tax_period;

        $nssfNo = $dataval->employee_nssf_no;
        $nhifNO = $dataval->employee_nhif_no;

        $basicSalary = ($dataval->basic_salary );
        $Yearly_basicSalary = ($dataval->basic_salary *12);
        $overtimePay = ($dataval->overtime_pay );
        $YearlyovertimePay = ($dataval->overtime_pay *12);

        $benefits = $dataval->benefits;
        $pri_benefits =$Yr_pri_benefits=0;
        $sec_benefits =$Yr_sec_benefits=0;

        foreach ($benefits as $benefit) { $pri_benefits = ($pri_benefits + $benefit->amount); $Yr_pri_benefits = (($Yr_pri_benefits+ $benefit->amount)*12); }
        $non_cash_benefits = $dataval->non_cash_benefits;
        foreach ($non_cash_benefits as $non_benefit){ $sec_benefits = ($sec_benefits + $non_benefit->amount); $Yr_sec_benefits = (($Yr_sec_benefits + $non_benefit->amount)*12);}

        $grossPay = $basicSalary + $overtimePay + $pri_benefits + $sec_benefits ; // total taxable income


        $OTHER_DEDUCTIONS = $this->OtherDeductions($dataval->other_deductions);
        $NHIF = $this->NHIF($dataval->nssf_deduction);
        $NSSF = $this->NSSF($dataval->nhif_deduction);
        $paye = $this->calculatePayee($grossPay);

        $taxablePaY = $grossPay;
        $totalRelief = $dataval->relief_fund;
        $total_TAx_Deductions = $NHIF + $NSSF + $paye + $OTHER_DEDUCTIONS; //TOTAL TAX

        $netPay = $grossPay - $total_TAx_Deductions;

//        RETIREMENTSCHEME
        $E1 = floatval(((30*$basicSalary)/100)) ;  //30%OF BASICSALARY
        $E2 = $dataval->E2; //actual
        $E3 = $dataval->E3; //fixed

//        owner occupied interest
        $F = $dataval->F;

//        ?RETIREMENT CONTRIBUTION
        if ($E1 < $E2 || $E1 < $E3) $G = $E1;
        elseif($E1 > $E2 || $E2 < $E3) $G = $E2;
         else $G = $E3;
        $Months = $dataval->months;
//         CHARGEABLE PAY
        $H = ($grossPay - $G);

//        $PERSONAL RELIEF
            $PersonalRelief = $dataval->personalRelief;
            $InsuranceRelief = $dataval->InsuranceRelief;

        $result = [
            'employeeName' => $employeeName,
            'Employee_other_Names' => 'NA',
            'employeeKraPin' => $employeeKraPin,
            'employerName' => $employerName,
            'employerKraPin' => $employerKraPin,
            'periodCovered' => $periodCovered,

            'basicSalary' => $basicSalary,
            'overtimePay' => $overtimePay,
            'benefits' => $pri_benefits,
            'non_cash_benefits' => $sec_benefits,
            'grossPay' => $grossPay,
            'nssf_No' => $nssfNo,
            'nhif_No' => $nhifNO,
            'payee' => $paye,
            'E1'=>$E1,
            'E2'=>$E2,
            'E3'=>$E3,
            'F'=>$F,
            'G'=>$G,
            'H'=>$H,
            'TaxCharged'=>$total_TAx_Deductions,
            'PersonalRelief'=>$PersonalRelief,
            'InsuranceRelief'=>$InsuranceRelief,
            'Months' => $Months,
            'taxable_pay' => $taxablePaY,
            'total_relief'=> $totalRelief,
            'totalDeductions' => $total_TAx_Deductions,
            'netPay' => $netPay,
        ];
        return $result;

//        return json_decode(file_get_contents($file_url,true));
    }
    public function viewPDF(){
//        $data = $this->getP9A_taxData();
//        $pdf = (new \Barryvdh\DomPDF\PDF)->loadView('PDF',array('data'=>$data))
//        ->setPaper('A4','landscape');
//        return $pdf->stream();
    }
    public function generatePDF(){
        $data = $this->getP9A_taxData();

        $pdf = PDF::loadView('pdf.PDF',array('data'=>$data))->setPaper('A4','landscape');

        return $pdf->download('RMP9A_TAX.pdf');
    }
    public function generateExcel(){
        $data = $this->getP9A_taxData();
//        dd($data);

        $excel = Excel::download(new TaxDataExport($data), 'RMP9A_TAX.xlsx');

//        $spreadsheet = new Spreadsheet($excel);
//        $activeWorksheet = $spreadsheet->getActiveSheet();
////        $activeWorksheet->setCellValue('A1', 'Hello World !');
//        $styleArray = [
//            'borders' => [
//                'outline' => [
//                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
//                    'color' => ['argb' => 'FFFF0000'],
//                ],
//            ],
//        ];
//
//        $activeWorksheet->getStyle('A7:O22')->applyFromArray($styleArray);

        return $excel;

    }

    private function SaveP9A_taxData($data){
        $file_url = storage_path('app/P9A_taxData.json');
        file_put_contents($file_url,json_encode($data));
    }

    private function calculatePayee($gross_salary){
        $TOtalPAYE = 0;
        if ($gross_salary <=24000){
            return $TOtalPAYE;
        }else{
            $Annual_gross_salary = $gross_salary;
            $SalariedNet = 24000; // First KES 288,000 (KES 24,000 x 12) is tax-free.
            $netCash = $Annual_gross_salary - $SalariedNet; // remaining amount after payable net has been deduscted

            $TOtalNET = (($netCash * 10)/100); //The next  is taxed at 10% = KES 1,200.
            $TOtalPAYE = $TOtalNET;
        }
        return $TOtalPAYE;
    }
    private function NSSF($employee_nssf_val){
        $employeeContribution = $employee_nssf_val;
        $EmployerContribution = $employee_nssf_val;

        return floatval(($employeeContribution + $EmployerContribution)*12);
    }
    private function NHIF($NHIF_employee_val)
    {
        return $NHIF_employee_val;
    }

    private function OtherDeductions($deduction_array){
        $Total_deductions = 0;
        if (!empty($deduction_array)){
            foreach($deduction_array as $deductions){
                $Total_deductions = $Total_deductions + $deductions->amount;
            }
        }

        return $Total_deductions;
    }
}
