@extends ('masterC')
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

.vl {
  border-left: 6px solid black;
  height: 600px;
  width:20%
}

</style>
<h3 style="color:orange;font-size:39px;text-align:center;margin-top:-6%;">Create New Student's Profile</h3>
<br><br><br>
<form action='create' method='post'enctype="multipart/form-data">
    @csrf
<table>
  <tr>
    <td rowspan="11"><img src="/uploads/student/default.png"style="width:150px;height:150px; float:left;border-radius:50%;margin-right:25px;border;" name ="image">
    <br><br><input type ="file" name="image"></td>
</tr>
<tr>
    <td rowspan="11"><div class="vl"></div></td>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Name:</th>
<th><br><input type="text" name = "name"  size="40" placeholder="Student's Name" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Matric ID:</th>
<th>&emsp;<br>&emsp;<input type="text"  name = "id"  size="40" placeholder ="Student's Matric ID"><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Address:</th>
<th>&emsp;<br>&emsp;<input type="text" name="address" size="40" placeholder="Student's Address" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Phone Number:</th>
<th>&emsp;<br>&emsp;<input type="text" name="phonenum" size="40" placeholder="Student's Phone Number" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Email:</th>
<th>&emsp;<br>&emsp;<input type="text" name="email" size="40" placeholder="Student's Email Address" required><br><br></th>
</tr>

<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Year:<br><br></th>
<th>&emsp;<br>&emsp;<select name = "year" required>
<option value ="3">3</option>
<option value = "4"> 4</option>
</select></th>
</tr>

<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Supervisor:</th>
<th>&emsp;<br>&emsp;<input type="text" name = "supervisor"  size="40" placeholder="Supervisor's Name" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;PSM title:</th>
<th>&emsp;<br>&emsp;<input type="text" name = "psmtitle"  size="40" placeholder="Student's PSM title" required><br><br></th>
</tr>

<tr>
<th style="width:50%">&emsp;&emsp;&emsp;PSM Type:<br><br><br></th>
<th>&emsp;<select name = "psmtype" required>
<option value ="PSM1">PSM 1</option>
<option value = "PSM2"> PSM 2</option>
<option value = "PTA"> PTA</option>
</select></th>
</tr>
@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

</table>
<br><br>
<button type="submit" class="b b1" value="create" style="width:80px;height:30px;margin-left:70%;"> CREATE</button>
<button onclick="location.href='{{ url('/searchstudent') }}'" type="submit" class="b b1" value="Back" style="width:80px;height:30px;margin-left:1%;">BACK</button></a>
<br><br>
</form>
</html>




@endsection
