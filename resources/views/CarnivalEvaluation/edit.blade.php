@extends('masterC')

@section('menu')
<html>

    <body>

        <h2>Edit Forms</h2>

        <form action="{{ route('CarnivalEvaluation.update', ['carnival_evaluation'=> $carnival_evaluation]) }}" method="POST">
            @method('PUT')
            @csrf
            <label for="reason">Reason:</label><br>
            <input name="reason" type="text" placeholder="Type here" value="{{ $carnival_evaluation->reason }}"><br><br>
            <label for="date">Date:</label><br>
            <input name="date" type="date" placeholder="Type here" value="{{ $carnival_evaluation->date }}"><br><br>
            <input type="submit" value="Submit">
        </form>

    </body>

    </html>
@endsection
