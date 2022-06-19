@extends('masterS')

@section('table')
<center>
<h1 class="display-3">FYP CARNIAL MARKS</h1>
<br><br>

<center>
<table class="table table-dark" style="width:75%">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">NAME</th>
      <th scope="col">MATRIX ID</th>
      <th scope="col">SUPERVISOR</th>
      <th scope="col">FINAL YEAR PROJECT TITLE</th>
      <th scope="col">PSM 1 TOTAL</th>
      <th scope="col">PSM 2 TOTAL</th>
      <th scope="col">TOTAL MARKS</th>
      <th scope="col">ASSIGN INDUSTRY</th>
    </tr>
  </thead>
  <tbody>
  @foreach($id as $data)  
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{$data->studentName}}</td>
      <td>{{$data->studentID}}</td>
      <td>{{$data->SvName}}</td>
      <td>{{$data->studentTitle}}</td>
      <td>{{$data->psm1Marks}}</td>
      <td>{{$data->psm2Marks}}</td>
      <td>{{$data->psmFinalResult}}</td>
      <td><a href="/assign_industry" class='btn btn-primary'>Assign</a></td>
    </tr>
   @endforeach 
  </tbody>
</table>
<center>
 <a href="/studentresult/top20" class="btn btn-primary btn-lg">Generate Top 20</a>&nbsp&nbsp&nbsp<button type="button" onclick="window.print()" class="btn btn-success btn-lg">Print Top 20 Result</button> <br>
@endsection