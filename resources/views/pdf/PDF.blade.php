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
            padding: 15px 0;
            margin: 0;

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


        table{
            margin: 4px 0; /* top bottom right left/*/
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

            <div class="header" style="text-align:center">
                <img src="assets/images/img.png" alt="logo">
{{--                <p>--}}
{{--                    KENYA REVENUE AUTHORITY<br>--}}
{{--                    DOMESTIC TAXES DEPARTMENT<br>--}}
{{--                    TAX DEDUCTION CARD YEAR 2018<br>--}}

{{--                </p>--}}
            </div>

            <div class="row" >
                <div class="column">
                    <div class="column-list">
                        <label for="Employers_Name">Employers_Name</label>
                        <input type="text" value=" {{ $data['employerName'] }}"><br>
                    </div><div class="column-list">
                        <label for="">Employee`s Main Name</label>
                        <input type="text" value=" {{ $data['employeeName'] }}"><br>
                    </div><div class="column-list">
                        <label for="">Employee`s Other Names</label>
                        <input type="text" value=" {{ $data['Employee_other_Names'] }}"><br>
                    </div>
                </div>

                <div class="column-pin">
                    <div class="column-list">
                        <label for="">Employer`s Pin</label>
                        <input type="text" value=" {{ $data['employerKraPin'] }}"><br>
                    </div>
                    <div class="column-list">
                        <label for="">Employees Pin</label>
                        <input type="text" value=" {{ $data['employeeKraPin'] }}">
                    </div>


                </div>
            </div>


            <div class="table-parent" style="position: relative!important">
                <table border="1px" cellspacing="0" style="scale: .3!important"  >
                    <tr>
                        <th>MONTH</th>
                        <th>Basic Salary <br><span>Kshs</span></th>
                        <th>Benefits Non Cash <br><span>Kshs</span>ksh</th>
                        <th>Value of Quaters<br><span>Kshs</span></th>
                        <th>Total Gross <br><span>Kshs</span></th>
                        <th colspan="3">Defined Contribution Retirement Scheme <br><span>Kshs</span></th>
                        <th>Owner Occupied Interest <br><span>Kshs</span></th>
                        <th>Retirement contribution and Owner Occupied Interest <br><span>Kshs</span></th>
                        <th>chargeable pay <br><span>Kshs</span></th>
                        <th>Tax charged <br><span>Kshs</span></th>
                        <th>Personal Relief <br><span>Kshs</span></th>
                        <th>Insurance Relief <br><span>Kshs</span></th>
                        <th>PAYE Tax (j-k) <br><span>Kshs</span></th>
                    </tr>

                    <tr style="text-align: center">
                        <td rowspan="2"></td>
                        <td rowspan="2">A</td>
                        <td rowspan="2">B</td>
                        <td rowspan="2">C</td>
                        <td rowspan="2">D</td>
                        <td colspan="3">E</td>
                        <td rowspan="2">F</td>
                        <td rowspan="2">G</td>
                        <td>H</td>
                        <td>J</td>
                        <td>K</td>
                        <td></td>
                        <td>L</td>
                    </tr>

                    <tr>
                        <td>E1 30% of A</td>
                        <td>E2 Actual</td>
                        <td>E3 Fixed</td>
                        <td></td>
                        <td></td>
                        <td colspan="2">Total Kshs</td>
                        <td></td>

                    </tr>
                    @foreach($data['Months'] as $key=> $months)
                        <tr>
                            <td>{{$months}}</td>
                            <td>{{ $data['basicSalary'] }}</td>
                            <td>{{ $data['benefits'] }}</td>
                            <td>{{ $data['non_cash_benefits'] }}</td>
                            <td>{{ $data['grossPay'] }}</td>
                            <td>{{ $data['E1'] }}</td>
                            <td>{{ $data['E2'] }}</td>
                            <td>{{ $data['E3'] }}</td>
                            <td>{{ $data['F'] }}</td>
                            <td>{{ $data['G'] }}</td>
                            <td>{{ $data['H'] }}</td>
                            <td>{{ $data['TaxCharged'] }}</td>
                            <td>{{ $data['PersonalRelief'] }}</td>
                            <td>{{ $data['InsuranceRelief'] }}</td>
                            <td>{{ $data['payee'] }}</td>

                        </tr>
                    @endforeach


                    <tr>
                        <td>Totals</td>
                        <td>{{ ($data['basicSalary']*12) }}</td>
                        <td>{{ ($data['benefits']*12)}}</td>
                        <td>{{ ($data['non_cash_benefits'] *12)}}</td>
                        <td>{{ ($data['grossPay'] *12)}}</td>
                        <td>{{ ($data['E1'] *12)}}</td>
                        <td>{{ ($data['E2'] *12)}}</td>
                        <td>{{ ($data['E3'] *12)}}</td>
                        <td>{{ ($data['F'] *12)}}</td>
                        <td>{{ ($data['G']*12) }}</td>
                        <td>{{ ($data['H']*12) }}</td>
                        <td>{{ ($data['TaxCharged']*12) }}</td>
                        <td>{{ ($data['PersonalRelief'] *12)}}</td>
                        <td>{{ ($data['InsuranceRelief']*12) }}</td>
                        <td>{{ ($data['payee'] *12)}}</td>
                        <td></td>
                    </tr>

                </table>
                <h4 style="text-align: center;">Total tax (COLL) Kshs</h4>
            </div>
            <p>To be completed by Employer by the end of the year</p>



            <div class="grid-container">
                <div class="item1">
                    <h4>TOTAL CHARGEABLE PAY(COL H) Kshs</h4>
                    <h5>important</h5>
                    <ol>
                        <li>
                            <div class="d-flex" style="display: flex">
                                <label style="width: 15px; margin-right: 12px">UseP9A </label>
                                <ul style="list-style: none; text-align: left;">
                                    <li>(a)&nbsp;For all liable employees and where director/employee received
                                        Benefits in addition to cash emoluments.</li>
                                    <li>(b)&nbsp;Where an employee is eligible to deduction on owner occupier interest.</li>
                                </ul>
                            </div>

                        </li>
                        <li>
                            (a) Deductible interest in respect of any month must not exceed Kshs, 12,500/=
                        </li>
                    </ol>

                </div>
                <div class="item2">
                    <ul style="list-style: none">
                        <li>(b) Attach
                            <ol type="i" start="1">
                                <li> Photostat copy of interest certificate and statement of account from the Financial Institution.</li>
                                <li> The DECLARATION duly signed by the employee.</li>
                            </ol>

                    </ul>

                </div>

            </div>

    </div>
</div>

</body>
</html>









