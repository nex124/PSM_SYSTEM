@extends('masterC')

@section('menu')
    <style>
        .btn7 {
            top: 50%;
            background-color: #C5C5C5;
            /* For browsers that do not support gradients */
            background-image: linear-gradient(#DCDCDC, #AEAEAE, #DCDCDC);
            color: #000000;
            border-style: groove;
            border-color: #D3D3D3;
            border-width: 1px;
            border-radius: 5px;
            padding: 8px;
            width: 10%;
        }

        .btn7:hover {
            background-image: -moz-none;
            background-image: -webkit-none;
            background-image: -webkit-none;
            background-image: -o-none;
            background-image: none;
            background-color: #E2AD27;
            box-shadow: 5px 5px 5px #888888;
            transition: 0.7s;
        }
    </style>

    <center>
        <h1>Manage Report</h1>

        <br><br>

        <div class><a href="studentListC">
                <button class="btn7">View Report</button>
            </a></div>
        <br>
        <div><a href="reportOverview">
                <button class="btn7">Report Overview</button>
            </a></div>
        <br><br><br><br><br><br>
    @endsection
