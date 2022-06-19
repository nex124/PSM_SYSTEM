@extends('masterC')

@section('menu')
<div class="overflow-x-auto">
    <html>

        <body>

            <h2>Carnival Evaluations Forms</h2>

            <form action="{{ route('CarnivalEvaluation.store') }}" method="POST">
                @csrf
                <label for="coordinatorID">Cooordinator ID:</label><br>
                <input name="coordinatorID" type="string" placeholder="Type here"><br>
                <label for="coordinatorName">Coordinator Name:</label><br>
                <input name="coordinatorName" type="text" placeholder="Type here"><br><br>
                <label for="studentName">Student Name:</label><br>
                <input name="studentName" type="text" placeholder="Type here"><br><br>
                <label for="studentID">Student ID:</label><br>
                <input name="studentID" type="text" placeholder="Type here"><br><br>
                <label for="studentPhone">Student Phone Number:</label><br>
                <input name="studentPhone" type="string" placeholder="Type here"><br><br>
                <label for="date">Date:</label><br>
                <input name="date" type="date" placeholder="Type here"><br><br>
                <label for="appoinmentID">Appoinment ID:</label><br>
                <input name="appoinmentID" type="string" placeholder="Type here"><br><br>
                <label for="reason">Reason:</label><br>
                <input name="reason" type="text" placeholder="Type here"><br><br>
                <input type="submit" value="Submit">
            </form>

        </body>

        </html>
    @endsection
