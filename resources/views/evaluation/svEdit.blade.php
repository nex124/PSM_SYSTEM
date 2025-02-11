@extends('masterS')


@section('form')

<div class="container">
  <h2>Update Marks</h2><br>
  <form class="form-horizontal" action="{{ url('updateSvMarks/'.$result->resultID.'/'.$result->psmType) }}" id="selectform" method="POST">
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="studentName">Name:</label>
      <div class="col-sm-10">
        <h4>{{ $result->studentName }}</h4>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="studentID">Matric No.:</label>
      <div class="col-sm-10">          
      <h4>{{ $result->studentID }}</h4>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="psmType">PSM Type:</label>
      <div class="col-sm-10">          
      <h4>{{ $result->psmType }}</h4>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="stdpsmtitle">Project Title:</label>
      <div class="col-sm-10">          
        <h4>{{ $result->stdpsmtitle }}</h4>
      </div>
    </div>
    @if($result->psmType != 'pta') 
      <div class="form-group">
      <label class="control-label col-sm-2" for="svMark1">First Evaluation Marks:</label>
      <div class="col-sm-5">          
        <input type="number" step="0.01" class="form-control" id="svMark1" value="{{ $result->svMark1 }}" name="svMark1">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="svMark2">Second Evaluation Marks:</label>
      <div class="col-sm-5">          
        <input type="number" step="0.01" class="form-control" id="svMark2" value="{{ $result->svMark2 }}" name="svMark2">
      </div>
    </div>
    @else
      <div class="form-group">
      <label class="control-label col-sm-2" for="svMark">Evaluation Marks:</label>
      <div class="col-sm-5">          
        <input type="number" step="0.01" class="form-control" id="svMark" value="{{ $result->svMark }}" name="svMark">
      </div>
    </div>
    @endif
    <br>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-default" type="button" onclick="checkreset()">
            Reset
        </button>
        <button type="submit" class="btn btn-default" style="margin-left: 30px;">Update</button>
      </div> 
    </div> 
  </form>
</div><br><br>

<script>
  function checkreset(){
    if(confirm('Are you sure to Reset?')){
      document.getElementById('selectform').reset(); 
      document.getElementById('svMark1').value = 0; 
      document.getElementById('svMark2').value = 0;
      document.getElementById('svMark').value = 0;
      return false;
    }
    return false;
  }
</script>

@endsection