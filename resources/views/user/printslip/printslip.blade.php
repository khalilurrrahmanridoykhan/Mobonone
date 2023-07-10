<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .pdf_hadding {
            text-align: center;
            /* font-family: 'Courier New'; */
        }

        .pdf_hadding>p>b {
            color: black;
            font-size: 17px;
            /* font-family: Arial, Helvetica, sans-serif; */

        }

        .pdf_hadding>p {
            color: black;
            font-size: 13px;
            /* font-family: Arial, Helvetica, sans-serif; */
            line-height: 15px
        }

        tr {
            line-height: 5px;
            overflow: hidden;
            height: 14px;
            white-space: nowrap;
        }

        .tuisionfeetr {
            line-height: 5px !important;
        }

        table>tbody {
            border: 1px solid #fff !important;
        }

        table>tbody>tr {
            border: 1px solid #fff !important;
        }

        table>tbody>tr>td {
            border: 1px solid #fff !important;
        }

        /* .datatable,.datatable>tr, .datatable>tr>td {
            border: 1px solid #000 !important;
        } */
        .datatable>tbody>tr {
            border: 1px solid #000 !important;
        }

        .datatable>tbody>tr>td {
            border: 1px solid #000 !important;
        }

        .datatable>thead>tr {
            border: 1px solid #000 !important;
        }

        .datatable>thead>tr>th {
            border: 1px solid #000 !important;
        }
    </style>
</head>

<body>


    <div>
        <table class="table">
            <tbody>
                <tr style="border: 1px solid #fff !important;">
                    <td scope="row">
                        {{-- <img src="{{ asset('ewuimage/ewuprintsliplogo.png') }}" alt=""> --}}
                        {{-- @dd($dt) --}}
                        <p>{{ date('Y-m-d H:i:s') }}</p>
                    </td>
                    <td class="pdf_hadding" colspan="2">
                        <p><b>East West University</b></p>
                        <p>A/2, Jahurul Islam Avenue, Jahurul Islam City, Aftabnagar, Dhaka-1212</p>
                        <p>Tel: 09666775577 (Hunting), Ext-224,364,365</p>
                        <p><b><u>Advising / Deposit Slip</u></b></p>
                    </td>
                    <td class="pdf_hadding">
                        <p><strong>Student Copy</strong></p>

                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td style="margin: 5px !important" scope="row" colspan="2">
                        @if (!empty($curentuserpersonaldata))
                            @foreach ($curentuserpersonaldata as $curentuserpersonaldatas)
                                Name:{{ $curentuserpersonaldatas->name }}
                            @endforeach
                        @endif

                    </td>
                    <td style="text-align: center" class="pdf_hadding">
                        @if (!empty($curentuserpersonaldata))
                            @foreach ($curentuserpersonaldata as $curentuserpersonaldatas)
                                Id:{{ $curentuserpersonaldatas->id }}
                            @endforeach
                        @endif
                    </td>
                    <td class="pdf_hadding">
                        Summer2023
                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td class="pdf_hadding" scope="row" colspan="2">
                        Course (s) Advised By

                    </td>
                    <td class="pdf_hadding" colspan="2">
                        (Sign): .......................................
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table datatable" id="tableID" style="cursor: pointer;">
            <thead>
                <tr>
                    <th>course</th>
                    <th>Sec </th>
                    <th>Cr</th>
                    <th>Tuition</th>
                    <th>Time-WeekDay</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($curentuser) --}}
                @if (!empty($curentuser))
                    @foreach ($curentuser as $curentusers)
                        <tr>
                            <td>{{ $curentusers->courses_code }}</td>

                            <td>{{ $curentusers->Section_no }}</td>
                            <td>{{ $curentusers->courses_cridit }}</td>
                            <td>
                                {{ $curentusers->courses_cridit * 5500 }}
                            </td>
                            <td>{{ $curentusers->day_no }}{{ $curentusers->time_no }}</td>
                            <td>
                                {{ $curentusers->room_no_for_class_no }}
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            The row is empty
                        </td>
                    </tr>
                @endif
            </tbody>



        </table>
    </div>
    <div>
        <table class="table">
            <tbody>
                <tr style="border: 1px solid #fff !important;" class="tuisionfeetr">
                    <td> Tuition Fee:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 }}
                            @endforeach
                        @endif
                    </td>
                    <td style="text-align: center">

                        a) Bank Asia Ltd. (Any Branch)

                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td> Special Waiver (20%):</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 * 0.2 }}
                            @endforeach
                        @endif
                    </td>
                    <td style="text-align: center">

                        b) United Commercial Bank Ltd. (Any Branch)

                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td> Tuition Fee after waiver:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 - $curentuserSigledatas->Total_cridit * 5500 * 0.2 }}
                            @endforeach
                        @endif
                    </td>
                    <td style="text-align: center">
                        c) One Bank Ltd. (Any Branch)

                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td> Laboratory Fee:</td>
                    <td>
                        2500
                    </td>
                    <td style="text-align: center">
                        d) Mutual Trust Bank Ltd. (Any Branch)

                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td> Student Activity Fee:</td>
                    <td>
                        510
                    </td>
                    <td style="text-align: center">
                        e) Dutch-Bangla Bank Ltd.

                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td> Grand Total:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 - $curentuserSigledatas->Total_cridit * 5500 * 0.2 + 2500 + 510 }}
                            @endforeach
                        @endif
                    </td>
                    <td>
                        Last Date: 14/6/2023
                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td> Grand Total with Late Fee:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 - $curentuserSigledatas->Total_cridit * 5500 * 0.2 + 2500 + 510 + 500 }}
                            @endforeach
                        @endif
                    </td>
                    <td>
                        Last Date: 28/6/2023
                    </td>
                </tr>
                <tr style="border: 1px solid #fff !important;">
                    <td> Grand Total with Late Fee:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 - $curentuserSigledatas->Total_cridit * 5500 * 0.2 + 2500 + 510 + 1000 }}
                            @endforeach
                        @endif
                    </td>
                    <td>
                        Last Date: 5/7/2023
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table">
            <tbody>


                <tr>
                    <td class="pdf_hadding" scope="row" colspan="5">
                        Mode of Payment:
                        No:...................................Date...........................Bank.................................

                    </td>
                    <td class="">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="pdf_hadding" scope="row" colspan="5">
                        Student's Signature: ................................Authorized Signature (By Bank):
                        ............................
                    </td>
                    <td class="">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left" class="pdf_hadding" scope="row" colspan="5">
                        Contact No: ...........................................
                    </td>
                    <td class="">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <hr>
    </div>

    <div>
        <table class="table">
            <tbody>
                <tr>
                    <td scope="row">
                        {{-- <img src="{{ asset('ewuimage/ewuprintsliplogo.png') }}" alt=""> --}}
                        {{-- @dd($dt) --}}
                        <p>{{ date('Y-m-d H:i:s') }}</p>
                    </td>
                    <td class="pdf_hadding" colspan="2">
                        <p><b>East West University</b></p>
                        <p>A/2, Jahurul Islam Avenue, Jahurul Islam City, Aftabnagar, Dhaka-1212</p>
                        <p>Tel: 09666775577 (Hunting), Ext-224,364,365</p>
                        <p><b><u>Advising / Deposit Slip</u></b></p>
                    </td>
                    <td class="pdf_hadding">
                        <p><strong>Student Copy</strong></p>

                    </td>
                </tr>
                <tr>
                    <td style="margin: 5px !important" scope="row" colspan="2">
                        @if (!empty($curentuserpersonaldata))
                            @foreach ($curentuserpersonaldata as $curentuserpersonaldatas)
                                Name:{{ $curentuserpersonaldatas->name }}
                            @endforeach
                        @endif

                    </td>
                    <td class="pdf_hadding">
                        @if (!empty($curentuserpersonaldata))
                            @foreach ($curentuserpersonaldata as $curentuserpersonaldatas)
                                Id:{{ $curentuserpersonaldatas->id }}
                            @endforeach
                        @endif
                    </td>
                    <td class="pdf_hadding">
                        Summer2023
                    </td>
                </tr>
                <tr>
                    <td class="pdf_hadding" scope="row" colspan="2">
                        Course (s) Advised By

                    </td>
                    <td class="pdf_hadding" colspan="2">
                        (Sign): .......................................
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table class="table">
            <tbody>
                <tr class="tuisionfeetr">
                    <td> Tuition Fee:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 }}
                            @endforeach
                        @endif
                    </td>
                    <td style="text-align: center">

                        a) Bank Asia Ltd. (Any Branch)

                    </td>
                </tr>
                <tr>
                    <td> Special Waiver (20%):</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 * 0.2 }}
                            @endforeach
                        @endif
                    </td>
                    <td style="text-align: center">

                        b) United Commercial Bank Ltd. (Any Branch)

                    </td>
                </tr>
                <tr>
                    <td> Tuition Fee after waiver:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 - $curentuserSigledatas->Total_cridit * 5500 * 0.2 }}
                            @endforeach
                        @endif
                    </td>
                    <td style="text-align: center">
                        c) One Bank Ltd. (Any Branch)

                    </td>
                </tr>
                <tr>
                    <td> Laboratory Fee:</td>
                    <td>
                        2500
                    </td>
                    <td style="text-align: center">
                        d) Mutual Trust Bank Ltd. (Any Branch)

                    </td>
                </tr>
                <tr>
                    <td> Student Activity Fee:</td>
                    <td>
                        510
                    </td>
                    <td style="text-align: center">
                        e) Dutch-Bangla Bank Ltd.

                    </td>
                </tr>
                <tr>
                    <td> Grand Total:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 - $curentuserSigledatas->Total_cridit * 5500 * 0.2 + 2500 + 510 }}
                            @endforeach
                        @endif
                    </td>
                    <td>
                        Last Date: 14/6/2023
                    </td>
                </tr>
                <tr>
                    <td> Grand Total with Late Fee:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 - $curentuserSigledatas->Total_cridit * 5500 * 0.2 + 2500 + 510 + 500 }}
                            @endforeach
                        @endif
                    </td>
                    <td>
                        Last Date: 28/6/2023
                    </td>
                </tr>
                <tr>
                    <td> Grand Total with Late Fee:</td>
                    <td>
                        @if (!empty($curentuserSigledata))
                            @foreach ($curentuserSigledata as $curentuserSigledatas)
                                {{ $curentuserSigledatas->Total_cridit * 5500 - $curentuserSigledatas->Total_cridit * 5500 * 0.2 + 2500 + 510 + 1000 }}
                            @endforeach
                        @endif
                    </td>
                    <td>
                        Last Date: 5/7/2023
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table">
            <tbody>


                <tr>
                    <td class="pdf_hadding" scope="row" colspan="5">
                        Mode of Payment:
                        No:...................................Date...........................Bank.................................

                    </td>
                    <td class="">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="pdf_hadding" scope="row" colspan="5">
                        Student's Signature: ................................Authorized Signature (By Bank):
                        ............................
                    </td>
                    <td class="">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left" class="pdf_hadding" scope="row" colspan="5">
                        Contact No: ...........................................
                    </td>
                    <td class="">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
