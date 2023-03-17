<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax form</title>
{{--    <link rel="stylesheet" href="{{asset('css/styles.css')}}">--}}
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px;
            box-sizing: border-box;
            background: #fcfcfc;
            padding: 0;
            margin: 0;
        }

        .parent-container{
            background: #ffff;
            padding: 50px 42px;
            margin: 5% 8%;
        }
        .header p{
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            color: #595959;
        }
        .header img{
            display: block;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            width:50%;
        }


        .column {
            float: left;
            width: 50%;
        }

        table{
            margin: 10px 0px 12px 12px; /* top bottom right left/*/
            font-size: 12px;
            /*color: #0000;*/


        }

        h5{
            text-decoration: underline;
            text-transform: uppercase;
        }
        input{
            margin-top: 2px;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            border-bottom: 2px dashed  #c7c7c7c7;
            font-size: 14px;
            font-width: 500;
            font-family: 'Verdana';
        }
        .column-pin input {
            margin-top: 2px;

            border: 2px solid #c7c7c7c7;
            font-size: 14px;
            font-width: 500;
            font-family: 'Verdana';
        }
        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            padding: 5px;
        }

        .grid-container > div {
            /*background-color: rgba(255, 255, 255, 0.8);*/
            text-align: left;
            padding: 10px 0;
            font-size: 15px;
        }

        p{
            font-size:  15px;
        }
        ol{
            margin: 5px 0;
        }
        ul li{
            padding: 8px 2px;
        }
        .parent-container .export-buttons{
            display:  flex;
            flex-direction: row;
            margin:15px 8px;
            text-align: left;

        }
        .parent-container .export-buttons button{
            border:0;
            font-size: 16px;
            cursor: pointer;
            margin: 5px 10px;
            padding: 12px 15px;
            transition: all .25s ease-in-out;
            border-radius : 12px;

        }.parent-container .export-buttons .excel{
             color: #ffff;
             background: #2ca02c;
         }.parent-container .export-buttons .pdf{
              color: #ffff;
              background: #058c9d;
          }
        .parent-container .export-buttons .excel:hover{
            background: #0b790b;
        } .parent-container .export-buttons .pdf:hover{
              background: #005964;
          }

    </style>
</head>
<body>
<div class="container-fluid parent-container">
    <div class="container">

        {{--    <form method="POST" action="{{ route('/Generate_File') }}">--}}

        <table border="1px" cellspacing="0" style="text-align: center">
            <tr>
                <td colspan="5" style="border: 0"></td>
                <td style="border: 0">
                    
                        <img src="assets/images/img.png" alt="logo" style="text-align:center;margin:auto auto;">

                </td>
                <td colspan="10" style="border: 0"></td>
            </tr>
{{--            <tr>--}}
{{--                <td colspan="15" style="text-align: center !important;">--}}
{{--                    <p>KENYA REVENUE AUTHORITY</p>--}}
{{--                    <p>DOMESTIC TAXES DEPARTMENT</p>--}}
{{--                    <p>TAX DEDUCTION CARD YEAR 2018</p>--}}
{{--                </td>--}}
{{--            </tr>--}}

        </table>


            <div class="row">
                <div class="column">
                    <label for="Employers_Name">Employers_Name</label>
                    <input type="text" value=" {{ $data['employerName'] }}"><br>
                    <label for="">Employee`s Main Name</label>
                    <input type="text" value=" {{ $data['employeeName'] }}"><br>
                    <label for="">Employee`s Other Names</label>
                    <input type="text" value=" {{ $data['Employee_other_Names'] }}"><br>

                </div>
                <div class="column-pin">
                    <label for="">Employer`s Pin</label>
                    <input type="text" value=" {{ $data['employeeKraPin'] }}"><br>
                    <label for="">Employees Pin</label>
                    <input type="text">
                </div>
            </div>

            <style>
                tr>td{
                    border: 1px solid black !important;
                }
            </style>

            <table border="1px" cellspacing="0" style="border: 1px solid black !important;">
                <tr>
                    <th style="border: 1px solid black !important;">MONTH</th>
                    <th style="border: 1px solid black !important;">Basic Salary <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">Benefits Non Cash <br><span>Kshs</span>ksh</th>
                    <th style="border: 1px solid black !important;">Value of Quaters<br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">Total Gross <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;" colspan="3">Defined Contribution Retirement Scheme <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">Owner Occupied Interest <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">Retirement contribution and Owner Occupied Interest <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">chargeable pay <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">Tax charged <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">Personal Relief <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">Insurance Relief <br><span>Kshs</span></th>
                    <th style="border: 1px solid black !important;">PAYE Tax (j-k) <br><span>Kshs</span></th>
                </tr>
                <tr>
                    <td rowspan="2" style="border: 1px solid black !important;"></td>
                    <td rowspan="2" style="border: 1px solid black !important;">A</td>
                    <td rowspan="2" style="border: 1px solid black !important;">B</td>
                    <td rowspan="2" style="border: 1px solid black !important;">C</td>
                    <td rowspan="2" style="border: 1px solid black !important;">D</td>
                    <td colspan="3" style="border: 1px solid black !important;">E</td>
                    <td rowspan="2" style="border: 1px solid black !important;">F</td>
                    <td rowspan="2" style="border: 1px solid black !important;">G</td>
                    <td style="border: 1px solid black !important;">H</td>
                    <td style="border: 1px solid black !important;">J</td>
                    <td style="border: 1px solid black !important;">K</td>
                    <td style="border: 1px solid black !important;"></td>
                    <td style="border: 1px solid black !important;">L</td>
                </tr>

                <tr>
                    <td style="border: 1px solid black !important;">E1 30% of A</td>
                    <td style="border: 1px solid black !important;">E2 Actual</td>
                    <td style="border: 1px solid black !important;">E3 Fixed</td>
                    <td style="border: 1px solid black !important;"></td>
                    <td style="border: 1px solid black !important;"></td>
                    <td style="border: 1px solid black !important;" colspan="2">Total Kshs</td>
                    <td style="border: 1px solid black !important;"></td>

                </tr>
                @foreach($data['Months'] as $key=> $months)
                    <tr>
                        <td style="border: 1px solid black !important;">{{$months}}</td>
                        <td style="border: 1px solid black !important;">{{ $data['basicSalary'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['benefits'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['non_cash_benefits'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['grossPay'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['E1'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['E2'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['E3'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['F'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['G'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['H'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['TaxCharged'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['PersonalRelief'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['InsuranceRelief'] }}</td>
                        <td style="border: 1px solid black !important;">{{ $data['payee'] }}</td>

                    </tr>
                @endforeach


                <tr>
                    <td style="border: 1px solid black !important;">Totals</td>
                    <td style="border: 1px solid black !important;">{{ ($data['basicSalary']*12) }}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['benefits']*12)}}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['non_cash_benefits'] *12)}}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['grossPay'] *12)}}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['E1'] *12)}}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['E2'] *12)}}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['E3'] *12)}}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['F'] *12)}}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['G']*12) }}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['H']*12) }}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['TaxCharged']*12) }}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['PersonalRelief'] *12)}}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['InsuranceRelief']*12) }}</td>
                    <td style="border: 1px solid black !important;">{{ ($data['payee'] *12)}}</td>
                    
                </tr>



                <tr>
                    <td colspan="15" >
                        <img src="assets/images/form_footer.png" alt="Footer">
                    </td>
{{--                <tr>--}}
{{--                    <td colspan="15"><h4 style="text-align: center;">Total tax (COLL) Kshs</h4> </td>--}}
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <td colspan="15">  <p>To be completed by Employer by the end of the year</p></td>--}}
{{--                </tr>--}}
{{--                    <td colspan="15" >--}}
{{--                        --}}
{{--                        <div class="grid-container" style="display: grid !important; ">--}}
{{--                            <div class="item1">--}}
{{--                                <h4>TOTAL CHARGEABLE PAY(COL H) Kshs</h4>--}}
{{--                                <h5>important</h5>--}}
{{--                                <ol>--}}
{{--                                    <li>--}}
{{--                                        <div class="d-flex" style="display: flex">--}}
{{--                                            <label style="width: 15px; margin-right: 12px">UseP9A </label>--}}
{{--                                            <ul style="list-style: none; text-align: left;">--}}
{{--                                                <li>(a)&nbsp;For all liable employees and where director/employee received--}}
{{--                                                    Benefits in addition to cash emoluments.</li>--}}
{{--                                                <li>(b)&nbsp;Where an employee is eligible to deduction on owner occupier interest.</li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}

{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        (a) Deductible interest in respect of any month must not exceed Kshs, 12,500/=--}}
{{--                                    </li>--}}
{{--                                </ol>--}}

{{--                            </div>--}}
{{--                            <div class="item2">--}}
{{--                                <ul style="list-style: none">--}}
{{--                                    <li>(b) Attach--}}
{{--                                        <ol type="i" start="1">--}}
{{--                                            <li> Photostat copy of interest certificate and statement of account from the Financial Institution.</li>--}}
{{--                                            <li> The DECLARATION duly signed by the employee.</li>--}}
{{--                                        </ol>--}}

{{--                                </ul>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </td>--}}
                </tr>



            </table>








    </div>
</div>

</body>
</html>









