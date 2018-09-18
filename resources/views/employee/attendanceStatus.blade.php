@extends('layouts.app')
@section('content')


  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 2px solid #6c757d;
    text-align: center;
    font-size: 14px;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>



<div class="container">

    <h1>Attendance Reporting</h1>

    <div style="position: relative">
      <div class="w3-container w3-teal" align="center">
        <p id="for" style="display: none;">:::::: Reporting For ::::::</p>
        <h1 style="display: none;" id="selectedEmp" name="selectedEmp">Employee Name</h1>
  
  
      </div>
      <strong>Select An Employee</strong>
 
       <select id="nameSelector" class="form-control input-lg" placeholder="Please Select An Employee">
                 
                @foreach ($records as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
      </select> 

      <strong>From Date:</strong>

      <input id="frmInput" class="timepicker form-control" type="text">
      <strong>To Date:</strong>

      <input id="toInput" class="timepicker form-control" type="text">

</div>
<div style="position: relative; padding-top: 30px; padding-bottom: 20px;">

      

      <button  id="absent" name="absent" class="btn btn-danger "> See Absent Report </button>

      <button  id="totalWR" name="totalWR" class="btn btn-info "> Total Working Hours </button>

      <button  id="lateCount" name="lateCount" class="btn btn-primary "> Late Count </button>

      <button  id="onLeave" name="onLeave" class="btn btn-danger "> On Leave Status </button>

      <button  id="all" name="all" class="btn btn-info "> Search All In </button>
     

</div>

    <div style="position: relative">
                

                <table id="reportTable" class="table-responsive table-condensed table-striped table-hover ">
                <thead>

                    <tr>

                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Attendance</th>
                    <th>On Leave</th>
                    <th>Total Woring Hour</th>

                    </tr>

                </thead>
                  
                  
                <tbody>

                  <tr>

                    <td>Imrul Kais Khan</td>
                    <td>imrulkk69@gmail.com</td>
                    <td>present</td>
                    <td>NO</td>
                    <td>8.6</td>
                   
                  </tr>

                </tbody>
                </table>
  

    </div>

</div>

<script type="text/javascript">

    $('.timepicker').datetimepicker({
      format: 'YY/MM/DD'
}); 



$(document).ready(function(){
    $("#nameSelector").change(function(){
       $("#for").show();
       $("#selectedEmp").show();
val =  $("#nameSelector option:selected").text();
       $("#selectedEmp").text(val);
        
    });
});

$("#absent").click(function(e){
    e.preventDefault();
  
    var starts = $('#frmInput').val();
    var ends = $('#toInput').val();
    var id = $('#nameSelector').val();
    

    

    var data = {   
                    "starts":starts,
                    "ends": ends,
                    "id":id,
                    
                };

    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        $.ajax({
                    type: "POST",
                    url: '/calculateAtt',
                    dataType: 'json',
                    data : data,
                   
                    success: function (data) {
                      $('#reportTable tbody').empty();
                       $.each(data.checkIN, function(i, user){
                      
                   
                          var $tr = $('<tr>').append(
                          $('<td>').text('Name'),
                          $('<td>').text(user.name)).appendTo('#reportTable');
                          

                      });
                      
                       
                       
                       
                      // if(data.user2 === "YES")
                      // {
                      //   alert("Saved Successfully");
                      //   location.reload();
                      // }
                      // else
                      // {
                      //   //alert("pass correct");
                      // }
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});


</script>  

 @endsection 