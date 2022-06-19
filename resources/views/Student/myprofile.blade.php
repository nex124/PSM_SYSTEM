@extends ('masterStu')
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
@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif
<h3 style="color:orange;font-size:39px;text-align:center;margin-top:-6%;">Student's Profile</h3>
<br><br><br>
<form action="/myprofile" method='get'>
<table>
    <tr>
    <td rowspan="11"><img src="{{$deta->image}}" style="width:250px;height:250px; float:left;border-radius:50%;margin-right:25px;" name="image"></td>
</tr>
<tr>
    <td rowspan="11"><div class="vl"></div></td>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Name:</th>
<th style="width:50%"><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->studentName}}" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Matric ID:</th>
<th><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->studentID}}" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Address:</th>
<th><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->stdaddress}}" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Phone Number:</th>
<th><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->studentPhone}}" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Email:</th>
<th><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->stdemail}}" required><br><br></th>
</tr>

<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Year:<br><br></th>
<th><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->stdyear}}" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;Supervisor:</th>
<th><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->stdsupervisor}}" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;PSM title:</th>
<th><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->stdpsmtitle}}" required><br><br></th>
</tr>
<tr>
<th style="width:50%">&emsp;&emsp;&emsp;PSM Type:<br><br></th>
<th><br>&emsp;&emsp;<input style = "border:2px solid orange;border-radius:5px;"type="text" readonly name = "name"  size="20" placeholder="Student's Name" value="{{$deta->psmType}}" required><br><br></th>
</tr>
<tr>

</table>
</form>
</html>




@endsection
