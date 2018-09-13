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

    <h1 style="color:#6cb2eb;">Attendance Reporting Between Dates</h1>

    <div style="position: relative">
      <div class="w3-container w3-teal" align="center">
        <p id="for" style="display: none; color:#38c172;" >:::::: Reporting For ::::::</p>
        <h1 style="display: none; color:#38c172;" id="selectedEmp" name="selectedEmp">Employee Name</h1>
  
  
      </div>
      <strong style="color:#6cb2eb;">Select An Employee</strong>
 
       <select id="nameSelector" class="form-control input-lg" placeholder="Please Select An Employee">
                 
                @foreach ($records as $item)
                    <option style="color:#6cb2eb;" value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
      </select> 

      <strong style="color:#6cb2eb;">From Date:</strong>

      <input id="frmInput" class="timepicker form-control" type="text">

</div>
<div style="position: relative">

      <strong style="color:#6cb2eb;">To Date:</strong>

      <input id="toInput" class="timepicker form-control" type="text">

      <button  id="daily" name="daily" class="btn btn-info "> Show Report </button>
     

</div>

    <div style="position: relative">
                

                <table id="reportTable">
                  <tr>
                    <th>Day</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Attendance</th>
                    <th>On Leave</th>
                    <th>Total Woring Hour</th>
                  </tr>
                  

                  <tr>
                    <td>Day</td>
                    <td>Imrul Kais Khan</td>
                    <td>imrulkk69@gmail.com</td>
                    <td>present</td>
                    <td>NO</td>
                    <td>8.6</td>
                   
                  </tr>

                </table>
  

    </div>

</div>

<script type="text/javascript">

    $('.timepicker').datetimepicker({
}); 



$(document).ready(function(){
    $("#nameSelector").change(function(){
       $("#for").show();
       $("#selectedEmp").show();
        val = $("#nameSelector option:selected").text();
        $("#selectedEmp").text(val);
        //alert(val);
    });
});


                          var date1;
                          var date2;
                          var timeDiff;
                          var diffDays; 

                          var inCHK;
                          var outCHK;



$("#daily").click(function(e){
    e.preventDefault();
  
    var starts = $('#frmInput').val();
    var ends = $('#toInput').val();
    var id = $('#nameSelector').val();
   
    
//alert(name);
    

    var data = {   "starts":starts,
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
                      // $('#reportTable tbody').empty();
                       
//                       $.each(data.checkIN, function(i, user){
                      
                    
//                           var $tr = $('<tr>').append(
//                           $('<td>').text('checkIN at'),
                          
//                           $('<td>').text(user.checkIN)).appendTo('#reportTable');
// inCHK =user.checkIN;
// //alert(inCHK);
//                        $.each(data.name, function(i, user){
                      
                    
//                           var $tr = $('<tr>').append(
//                             $('<td>').text('Name'),
//                           $('<td>').text(user.name)).appendTo('#reportTable');
                        
                          
                         
//                          $.each(data.checkOUT, function(i, user){
                          
//                           date1 = new Date(inCHK);
//                           date2 = new Date(outCHK);
//                           timeDiff = Math.abs(date2.getTime() - date1.getTime());
//                           diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 


//                           var $tr = $('<tr>').append(
//                           $('<td>').text('checkOUT at'),
//                           $('<td>').text(timeDiff)).appendTo('#reportTable');
//                 outCHK =user.checkOUT; 
//                // alert(outCHK);        
                       
//                          $.each(data.status, function(i, user){
                      
                    
//                           var $tr = $('<tr>').append(
//                           $('<td>').text('present at the Office'),
//                           $('<td>').text(user.staus_flag)).appendTo('#reportTable');
                         
                      

//                       });

//                       });

//                       });

//                       });
                      
                       
                       
                       
                    
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});


</script>  

 @endsection 