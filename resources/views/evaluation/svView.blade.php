@extends('masterS')

@section('table')

<div class="container mt-2">
  <h2>Supervisor's Evaluation</h2><br><br>

  <div class="container">
    <form action="">
          <div class="col-sm-10">
            <input type="search"  class="form-control" name="search" value="{{$search}}" placeholder="Search by Student ID">
          </div>
          <div>
            <button class="btn btn-default">Search</button>
            <a style="color:black;" href="{{url('/svView')}}">
            <button class="btn btn-default" type="button">Reset</button></a>
          </div>
    </form>
  </div><br><br>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#psm1">PSM 1</a></li>
    <li><a data-toggle="tab" href="#psm2">PSM 2</a></li>
    <li><a data-toggle="tab" href="#pta">PTA</a></li>
  </ul>
  <br>
  <div class="tab-content">
    <div class="tab-pane fade in active" id="psm1">
      <div class="row">
        <div class="col-md-12 text-right"><h4 style="font-weight:bold";>Deadline</h4></div><br>
        <div class="col-md-12 text-right"><h4>{{ $deadlinePsm1->svDeadline }}</h4></div>
      </div><br><br>
        <table class="table table-light">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Matric No</th>
              <th scope="col">Name</th>
              <th scope="col">SV Marks</th>
              <th scope="col">Evaluator Marks</th>
              <th scope="col">Total Marks</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($psm1marks as $psm1mark)
            <?php 
              $svmark1 = (float) $psm1mark->svMark1;
              $svmark2 = (float) $psm1mark->svMark2;
              $svmarks = $svmark1 + $svmark2;
            ?>
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $psm1mark->studentID }}</td>
              <td>{{ $psm1mark->studentName }}</td>
              <td>{{ $svmarks }}</td>
              <td>{{ $psm1mark->evMark }}</td>
              <td>{{ $psm1mark->totalMark }}</td>
              <td><a href="{{ url('svEdit/'.$psm1mark->resultID.'/'.$psm1mark->psmType)}}"><button class="btn btn-default">Update</button></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

    <div class="tab-pane fade" id="psm2">
      <div class="row">
        <div class="col-md-12 text-right"><h4 style="font-weight:bold";>Deadline</h4></div><br>
        <div class="col-md-12 text-right"><h4>{{ $deadlinePsm2->svDeadline }}</h4></div>
      </div><br><br>
    <table class="table table-light">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Matric No</th>
              <th scope="col">Name</th>
              <th scope="col">SV Marks</th>
              <th scope="col">Evaluator Marks</th>
              <th scope="col">Total Marks</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($psm2marks as $psm2mark)
            <?php 
              $svmark1 = (float) $psm2mark->svMark1;
              $svmark2 = (float) $psm2mark->svMark2;
              $svmarks = $svmark1 + $svmark2;
            ?>
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $psm2mark->studentID }}</td>
              <td>{{ $psm2mark->studentName }}</td>
              <td>{{ $svmarks }}</td>
              <td>{{ $psm2mark->evMark }}</td>
              <td>{{ $psm2mark->totalMark }}</td>
              <td><a href="{{ url('svEdit/'.$psm2mark->resultID.'/'.$psm2mark->psmType)}}"><button class="btn btn-default">Update</button></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

    <div class="tab-pane fade" id="pta">
      <div class="row">
        <div class="col-md-12 text-right"><h4 style="font-weight:bold";>Deadline</h4></div><br>
        <div class="col-md-12 text-right"><h4>{{ $deadlinePta->svDeadline }}</h4></div>
      </div><br><br>
    <table class="table table-light">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Matric No</th>
              <th scope="col">Name</th>
              <th scope="col">SV Marks</th>
              <th scope="col">Evaluator Marks</th>
              <th scope="col">Total Marks</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ptamarks as $ptamark)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $ptamark->studentID }}</td>
              <td>{{ $ptamark->studentName }}</td>
              <td>{{ $ptamark->svMark }}</td>
              <td>{{ $ptamark->evMark }}</td>
              <td>{{ $ptamark->totalMark }}</td>
              <td><a href="{{ url('svEdit/'.$ptamark->resultID.'/'.$ptamark->psmType)}}"><button class="btn btn-default">Update</button></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
</div><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection