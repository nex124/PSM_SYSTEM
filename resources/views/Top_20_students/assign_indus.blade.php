@extends('masterS')

@section('form')
<center>
<h1 class="display-3">FYP CARNIAL MARKS</h1>
<br><br>

<form action="/assign_industry/add" method="post">

 {{csrf_field() }}
   <div class="form-group"> 
    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text"  name="studentName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name of Student">
   </div>
   <br>
  </div>
  <div class="form-group"> 
    <label for="staticEmail" class="col-sm-2 col-form-label">MATRIX ID</label>
    <div class="col-sm-10">
    <input type="text"  name="studentID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Matrix ID of student">
   </div>
    <br><br>
    <div class="form-group"> 
    <label for="staticEmail" class="col-sm-2 col-form-label">FYP TITLE</label>
    <div class="col-sm-10">
    <input type="text"  name="studentTitle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter FYP title">
   </div>
    <br><br>
  </div>
  <div class="col-7">
    <label for="exampleFormControlTextarea1">ASSIGN INDUSTRY NAME</label>
    <textarea class="form-control" name="indusName" id="exampleFormControlTextarea1" rows="1" placeholder="Enter Industry Name"></textarea>
  </div> 
  <br>
  </div>
  <div class="col-3">
    <label for="exampleFormControlTextarea1">INDUSTRY TYPE</label>
    <textarea class="form-control" name="indusType" id="exampleFormControlTextarea1" rows="1" placeholder="Enter Industry Type"></textarea>
  </div> 
  <br>
  <div class="col-8">
    <label for="exampleFormControlTextarea1">JUSTIFICATION</label>
    <textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="4"></textarea>
  </div>
  <br><br>
  <center>
  <button type="submit" class="btn btn-dark btn-lg">Save Data</button>
  <br>
</form>
@endsection