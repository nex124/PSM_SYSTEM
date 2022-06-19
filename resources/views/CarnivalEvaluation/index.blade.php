@extends('masterC')

@section('menu')
    <html>

    <head>
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 70%;
            }

            #customers td,
            #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            #customers tr:hover {
                background-color: #ddd;
            }

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
        </style>
    </head>

    <body>

        <h1>Carnival Evaluation Table</h1>

        <table id="customers">
            <tr>
                <th>Coordinator ID</th>
                <th>Coordiantor Name</th>
                <th>Student ID</th>
                <th>Student Phone Number</th>
                <th>Date</th>
                <th>Appoinment ID</th>
                <th>Reason</th>
            </tr>
                @foreach ($carnivals as $CarnivalEvaluation)
                    <tr>
                        <td class="font-bold"> {{ $CarnivalEvaluation->coordinatorID }}</td>
                        <td class="font-bold"> {{ $CarnivalEvaluation->coordinatorName }}</td>
                        <td class="font-bold"> {{ $CarnivalEvaluation->studentID }}</td>
                        <td class="font-bold"> {{ $CarnivalEvaluation->studentPhone }}</td>
                        <td class="font-bold"> {{ $CarnivalEvaluation->date }}</td>
                        <td class="font-bold"> {{ $CarnivalEvaluation->appoinmentID }}</td>
                        <td class="font-bold"> {{ $CarnivalEvaluation->reason }}</td>
                        <td><a class="btn" href="{{ route('CarnivalEvaluation.edit' , ['carnival_evaluation' => $CarnivalEvaluation]) }}">Edit</a></td>
                    </tr>
                @endforeach
        </table>
        <a class="btn" href="{{ route('CarnivalEvaluation.create') }}">Add</a>
        {{-- <a class="btn" href="{{ route('CarnivalEvaluation.edit') }}">Edit</a> --}}
    </body>

    </html>
@endsection
