@extends ('masterC')
@section('content')

<!DOCTYPE html>
    <html>
        <style>

table{
border:no border;
text-align:center;
font-size:18px;
margin-left:200px;
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
@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif
<h3 style="color:orange;font-size:39px;text-align:center;margin-top:-6%;">Student's Profile</h3>
<br><br><br><br><br><br>
@foreach($result as $detaa)
<form action="/updatestudent/{{$detaa->studentID}}/update" method='post'>
    @csrf
<table>
    <tr>
        <th><img src="" style="height=150";width="150";></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Name:</th>
<th>&emsp;&emsp;<input type="text" name = "name"  size="40" placeholder="Student's Name" value="{{ $detaa->studentName }}"required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Matric ID:</th>
<th>&emsp;&emsp;{{$detaa->studentID}}<br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Address:</th>
<th>&emsp;&emsp;<input type="text" name = "name"  size="40" placeholder="Student's Name" value="{{$detaa->stdaddress}}"required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Phone Number:</th>
<th>&emsp;&emsp;<input type="text" name = "name"  size="40" placeholder="Student's Name" value="{{$detaa->studentPhone}}"required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Email:</th>
<th>&emsp;&emsp;<input type="text" name = "name"  size="40" placeholder="Student's Name" value="{{$detaa->stdemail}}"required><br><br></th>
</tr>

<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Year:<br><br></th>
<th>&emsp;&emsp;<select name = "year" value="{{$detaa->stdyear}}" required>
<option value ="3">3</option>
<option value = "4"> 4</option><br><br>
</select></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Supervisor:</th>
<th>&emsp;&emsp;<input type="text" name = "name"  size="40" placeholder="Superviaor's Name" value="{{$detaa->stdsupervisor}}"required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PSM title:</th>
<th>&emsp;&emsp;<input type="text" name = "name"  size="40" placeholder="PSM title" value="{{$detaa->stdpsmtitle}}"required><br><br></th>
</tr>
<tr>
<th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PSM Type:<br><br></th>
<th>{{$detaa->psmType}}</th>
</tr>
@endforeach
</table>
<br><br>
<input type="submit" class="b b1" value="Update" style="width:100px;margin-left:1000px;">
</form>
<br><br>
</html>




@endsection
