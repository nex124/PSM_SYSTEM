@extends ('masterC')
@section('content')


<!DOCTYPE html>
    <html>
        <style>

table {
    margin:auto;
    width:95%;
    border-collapse:collapse;
    font-family:Arial;
    padding-bottom:20px;
}

table th,td{
  border: 2px solid orange;
  height:25px;
  text-align:center;
}

.search{
  width:100px;
  margin-left:20px;
  border-radius:8px;
}

.search1 {
  background-color: white; 
  color: black; 
  border: 2px solid orange;
}

.search1:hover {
  background-color: orange;
  color: white;
}

.search {
    margin-left:35px;
}

.search2 {
    margin-left:30px;
}

</style>

<h3 style="color:orange;font-size:39px;text-align:center;margin-top:-6%;">Supervisor's Profile</h3>
<br><br><br><br><br><br>
<div class=search2>
                <form action="/searchsvlist/search" method="GET" role="search">
                    <div class="input-group">
                    &emsp;&emsp;<button class="btn btn-info" style="width:10%;height:10%;font-size:18px;background-colour:white" size="5" type="submit" title="Search projects"><i class="fas fa-search"></i></button>
                        <input style="width:60%;height:10%;font-size:18px;" size="30" type="text" class="form-control mr-2" name="deta" placeholder="Search Supervisor's name" id="deta">
                        <a href="/searchsvlist" class=" mt-1">&emsp;<button  class="btn btn-danger" style="width:10%;height:10%;font-size:18px;" size="5" type="button" title="Refresh page"><i class="fas fa-sync-alt"></i></button></a>
                    </div>
                    @if(!empty($successMsg))
                        <div class="alert alert-success"> {{ $successMsg }}</div>
                    @endif

                    @if(!empty($FailedMsg))
                        <div class="alert alert-danger"> {{ $FailedMsg }}</div>
                    @endif
</div>
</form>
<div class = "table">
<br>
<table>
  <thead>
<tr>
<th>ID</th>
	<th>Name</th>
	<th>Phone Number</th>
	<th>Email</th>
  <th>View</th>
  <th>Delete</th>
  </tr>
</thead>
@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif
<tbody>
@foreach($deta as $detaa)
  <tr>
  <td>{{$detaa->supervisorID}}</td>
	<td >{{$detaa->svname}}</td>
	<td>{{$detaa->svphonenum}}</td>
    <td>{{$detaa->svemail}}</td>
    <td><a href="/viewsvprofile/{{ $detaa->supervisorID }}"><button type="button" style="background-color: white; border: 1px solid white;" > <i class="fas fa-eye"></i> </button></a></td>
    <td><a href="/searchsvlist/{{ $detaa->supervisorID }}"><button onclick="return confirm('Are you sure? This record and it`s details will be permanantly deleted!')" type="button" style="background-color: white; border: 1px solid white;" > <i class="fas fa-trash"></i> </button></a></td>
  </tr>
  @endforeach
</tbody>
      </table>
<br><br>
<a href="/createsvprofile" class=" mt-1">
<input type="submit" class="search search1" name="new" value="Insert New Profile" style="width:200px;margin-left:900px;"></a>
<br><br><br>
</div>
</html>




@endsection
