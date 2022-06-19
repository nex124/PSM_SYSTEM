@extends ('masterC')
@section('content')

<!DOCTYPE html>
    <html>
        <style>

table {
border:no border;
text-align:left;
font-size:15px;
height:25px;
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

</style>
<h3 style="color:orange;font-size:39px;text-align:center;margin-top:-6%;">Create New Supervisor's Profile</h3>
<br><br><br>
<form action='createsv' method='post'>
    @csrf
<table>
    <tr>
        <th><img src="" style="height=150";width="150";></th>
</tr>
<tr>
<th style = "font-size:30px;border:2px;color:orange;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;Biography</th>
</tr>
<tr>
<th>&emsp;&emsp;<input style=" width :500px;height:150px;margin-left:60%;" type="text" name = "biography"  size="40" placeholder="Supervisor's biography" required><br><br></th>
</tr>
<br>
<tr>
<th colspan="2" style = "font-size:30px;border:2px;color:orange;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Info<br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; *SupervisorID: <br><br></th>
<th><input type="text" name = "id"  size="40" placeholder ="Supervisor's ID" required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; *Name: <br><br></th>
<th><input type="text"  name = "name"  size="40" placeholder ="Supervisor's name" required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;*Phone Number:<br><br></th>
<th><input type="text" name="phonenum" size="40" placeholder="Supervior's Phone Number" required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; *Email:<br><br></th>
<th><input type="text" name="email" size="40" placeholder="Supervisor's email" required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;*Expertise:<br><br></th>
<th><input type="text" name="expertise" size="40" placeholder="Supervisor's expertise"><br><br></th>
</tr>
<tr>
<th style = "font-size:15px;border:2px;color:red;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; *Required Field</th>
</tr>
@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

</table>
<br><br>
<input type="submit" class="b b1" value="Create Profile" style="width:150px;height: 40px;margin-left:50%;"></a>
<button onclick="location.href='{{ url('/searchsvlist') }}'" type="submit" class="b b1" value="DeBack" style="width:80px;height: 40px;margin-right:1%;">BACK</button>
<br><br>
</form>
</html>




@endsection
