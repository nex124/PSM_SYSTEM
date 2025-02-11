@extends('masterC')

@section('table')
<style>
td{
  border:1px solid;
  padding-left:5px;
  width:10%;
  text-align:center;
}
h5{
  padding-left:5px;
}
.btn5{
  width:10%;
  border-width:1px;
  border-color:#D3D3D3;
  border-radius:5px;
  height:30px;
  background-color: #C5C5C5; 
  background-image: linear-gradient(#DCDCDC, #AEAEAE, #DCDCDC);
}
.btn5:hover {
  background-image: -moz-none;
  background-image: -webkit-none;
  background-image: -webkit-none;
  background-image: -o-none;
  background-image:none;
  background-color: #E2AD27;
  box-shadow: 5px 5px 5px #888888;
  transition: 0.7s;
}
.center{
  text-align:center;
}
.divcenter{
  margin:auto;
  text-align:center;
}
select,option{
  width:150px;
  height:30px;
}

</style>
<script>
function PrintElem(print)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(print).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); 
    mywindow.focus(); 

    mywindow.print();
    mywindow.close();

    return true;
}
</script>
<div id="print">
<div class="center" >
<h1>Report Overview</h1><br>
</div>

<form action = "">
<div class="divcenter">
  <div>
    <label>Select Type:</label>
    <select id="psmType" name="psmType">
      <option value="psm1">PSM 1</option>
      <option value="psm2">PSM 2</option>
      <option value="pta">PTA</option>
    </select>
    <button class="btn5">Show</button>
  </div>
</div>
</form>



@if($psmType=='psm1')
  <div class="tab-content">
    <div class="tab-pane fade in active" id="psm1">
      <div style="padding-left:15px;padding-top:15px;width:140%">
      <h5 style="display:inline-block;">Report Overview For <b>PSM 1</b></h5>
      </div>

      <br>
        <table class="table table-light" style="border:1px solid;width:75%;margin:auto">
          <thead>
          <tr style="background-color:#C5C5C5;font-weight:bold;">
            <td scope="col">Grade</td>
            <td scope="col">A</td>
            <td scope="col">B</td>
            <td scope="col">C</td>
            <td scope="col">D</td>
            <td scope="col">E</td>
            <td scope="col">F</td>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td scope="row">Total</td>
            <td>{{$A}}</td>
            <td>{{$B}}</td>
            <td>{{$C}}</td>
            <td>{{$D}}</td>
            <td>{{$E}}</td>
            <td>{{$F}}</td>
          </tr>
          </tbody>
        </table>
        <br><br><br><br>
        <div id="container" class="divcenter" style="width:700px;"></div><br>
        <div class="divcenter">
        <button class="btn5" onclick="PrintElem('print')">Print</button>
        </div>
        
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script>
          var grade=<?php echo json_encode($grade)?>;
          Highcharts.chart('container',{
            chart: {
              backgroundColor: 'rgba(0,0,0,0)'
            },
            title:{
              text:"PSM 1 Report Overview"
            },
            xAxis:{
              categories: ['A', 'B', 'C', 'D', 'E', 'F']
            },
            yAxis:{
              title:{
                text:"Number of Student"
              }
            },

            series:[{
              color:'orange',
              name:"Number of Student",
              data:grade
            }],
            credits:{
              enabled: false
            },
          });
          </script>
    </div>
</div>

  @elseif($psmType == 'psm2')
  <div class="tab-content">
    <div class="tab-pane fade in active" id="psm2">
      <div style="padding-left:15px;padding-top:15px;">
      <h5 style="display:inline-block;">Report Overview For <b>PSM 2</b></h5>
      </div>

      <br>
        <table class="table table-light" style="border:1px solid;width:75%;margin:auto">
          <thead>
          <<tr style="background-color:#C5C5C5;font-weight:bold;">
            <td scope="col">Grade</td>
            <td scope="col">A</td>
            <td scope="col">B</td>
            <td scope="col">C</td>
            <td scope="col">D</td>
            <td scope="col">E</td>
            <td scope="col">F</td>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td scope="row">Total</td>
            <td>{{$A}}</td>
            <td>{{$B}}</td>
            <td>{{$C}}</td>
            <td>{{$D}}</td>
            <td>{{$E}}</td>
            <td>{{$F}}</td>
          </tr>
          </tbody>
        </table>
        <br><br><br><br>
        <div id="container" class="divcenter" style="width:700px;"></div><br>
        <div class="divcenter">
        <button class="btn5" onclick="PrintElem('print')">Print</button>
        </div>
        
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script>
          var grade=<?php echo json_encode($grade)?>;
          Highcharts.chart('container',{
            chart: {
              backgroundColor: 'rgba(0,0,0,0)'
            },
            title:{
              text:"PSM 2 Report Overview"
            },
            xAxis:{
              categories: ['A', 'B', 'C', 'D', 'E', 'F']
            },
            yAxis:{
              title:{
                text:"Number of Student"
              }
            },

            series:[{
              color:'orange',
              name:"Number of Student",
              data:grade
            }],
            credits:{
              enabled: false
            },
          });
          </script>
    </div>
  </div>
  @elseif($psmType == "pta")
  <div class="tab-content">
    <div class="tab-pane fade in active" id="pta">
      <div style="padding-left:15px;padding-top:15px;">
      <h5 style="display:inline-block;">Report Overview For <b>PTA</b></h5>
      </div>

      <br>
        <table class="table table-light" style="border:1px solid;width:75%;margin:auto">
          <thead>
          <tr style="background-color:#C5C5C5;font-weight:bold;">
            <td scope="col">Grade</td>
            <td scope="col">A</td>
            <td scope="col">B</td>
            <td scope="col">C</td>
            <td scope="col">D</td>
            <td scope="col">E</td>
            <td scope="col">F</td>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td scope="row">Total</td>
            <td>{{$A}}</td>
            <td>{{$B}}</td>
            <td>{{$C}}</td>
            <td>{{$D}}</td>
            <td>{{$E}}</td>
            <td>{{$F}}</td>
          </tr>
          </tbody>
        </table>
        <br><br><br><br>
        <div id="container" class="divcenter" style="width:700px;"></div><br>
        <div class="divcenter">
        <button class="btn5" onclick="PrintElem('print')">Print</button>
        </div>
        
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script>
          var grade=<?php echo json_encode($grade)?>;
          Highcharts.chart('container',{
            chart: {
              backgroundColor: 'rgba(0,0,0,0)'
            },
            title:{
              text:"PTA Report Overview"
            },
            xAxis:{
              categories: ['A', 'B', 'C', 'D', 'E', 'F']
            },
            yAxis:{
              title:{
                text:"Number of Student"
              }
            },

            series:[{
              color:'orange',
              name:"Number of Student",
              data:grade
            }],
            credits:{
              enabled: false
            },
          });
          </script>
    </div>
  @else
  <br><br><br><br><br><br><br>
  @endif
  <script>
        function printDiv() {
            var divContents = document.getElementById("print").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            
            a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            
            a.document.close();
            a.print();
        }
    </script>
<br><br>
</div>
@endsection