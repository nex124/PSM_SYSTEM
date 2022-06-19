@extends ('masterS')
@section('content')

<!DOCTYPE html>
    <html>
        <style>

table{
border:no border;
text-align:left;
font-size:15px;
margin-left:160px;
margin-right:150px;
}
.round {
  border-radius: 50%;
}

.b{
  width:100px;
  margin-left:20px;
  border-radius:8px;
}


.b1 {
  background-color: white; 
  color: black; 
  border: 2px solid orange;
}

.b1:hover {
  background-color: orange;
  color: white;
}

.bio{
    margin-left:90%;
}


</style>
@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif
<h3 style="color:orange;font-size:39px;text-align:center;margin-top:-6%;">Supervisor's Profile</h3>
<br><br><br>
<form action="/svmyprofile"  method='get'>
    @csrf
<table>
<tr>
<th style = "font-size:30px;border:2px;color:orange;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;Biography</th>
</tr>
<tr>
<th>&emsp;&emsp;<input style = "border:2px solid black;border-radius:5px;width:500px;height:100px;margin-left:60%;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{ $deta->svbiography }}" required><br><br></th>
</tr>
<br>
<tr>
<th colspan="2" style = "font-size:30px;border:2px;color:orange;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Info<br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;SupervisorID: <br><br></th>
<th><input style = "border:2px solid black;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{ $deta->supervisorID }}" required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Name: <br><br></th>
<th><input style = "border:2px solid black;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{ $deta->svname }}" required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Phone Number:<br><br></th>
<th><input style = "border:2px solid black;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{ $deta->svphonenum }}" required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Email:<br><br></th>
<th><input style = "border:2px solid black;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{ $deta->svemail }}" required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Expertise:<br><br></th>
<th><input style = "border:2px solid black;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{ $deta->svexpertise }}" required><br><br></th>
</tr>



</table>
</form>
</html>




@endsection
