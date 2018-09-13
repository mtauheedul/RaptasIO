
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
<div class="column">
	 <h1 style="font-size: 40px; color: #6cb2eb;">Leave Settings</h1>

    <div style="position: relative">
     
      

      <strong >Set Total Yearly Leave Day</strong>

<input id="setLeave" class="form-control" type="text">
<p  style=" font-size: 14px; color: red;">**Important : Employee Can Take Leave Upto This Days **</p>
	  <button  id="daily" name="daily" class="btn btn-info "> Set Fixed </button>
</div>
</div>
<div class="column">
	
<div class="card">
 
<div class="container">
    <h4><b id="days" style="font-size: 40px; color: #6cb2eb;">0 Days</b></h4>
    <p>Total Yearly Leave</p>
</div>
</div>

</div>
   

    

</div>

<div class="container">

    <h1 style="font-size: 40px; color: #6cb2eb;">Applying For Leave Here</h1>

    <div style="position: relative">
      <div class="w3-container w3-teal" align="center">
        <p id="for" style="display: none; font-size: 14px;">:::::: Leave Of Absense Applying For ::::::</p>
        <h1  style="display: none; font-size: 30px; color: #4dc0b5;" id="selectedEmp" name="selectedEmp">Employee Name</h1>
  
  
      </div>
      <strong style="font-size: 18px; color: #4dc0b5;">Select An Employee</strong>
 
       <select id="nameSelector" class="form-control input-lg" placeholder="Please Select An Employee">
                 
                @foreach ($records as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
      </select> 

      <strong>Leave Start Date:</strong>

      <input id="frmInput" class="timepicker form-control" type="text">

</div>
<div style="position: relative">

      <strong>Leave End Date:</strong>

      <input id="toInput" class="timepicker form-control" type="text">

       <strong>Leave Reasons:</strong>

      <input id="leaveReason" class="timepicker form-control" type="text">



      <button  id="apply" name="apply" class="btn btn-info "> Apply For Leave </button>
     

</div>

    <div style="position: relative">
                

                <table id="reportTable">
                  
                  <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Starts</th>
                    <th>Ends</th>
                    <th>Total Leave Days</th>
                    <th>Approval Status</th>
                  </tr>
                  

                  <tr>
                    <td>22</td>
                    <td>Imrul Kais Khan</td>
                    <td>9/13/2018</td>
                    <td>20/13/2018</td>
                    <td>12</td>
                    <td>Pending</td>
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
                      $('#reportTable tbody').empty();
                       $.each(data.name, function(i, user){
                      
                    
                          var $tr = $('<tr>').append(
                            $('<td>').text('Name'),
                          $('<td>').text(user.name)).appendTo('#reportTable');
                          //$('<td>').text(user.checkIN)
                         
                          //$("#emp_name").text(user.name);
                         // console.log(user.name);
                          $.each(data.checkIN, function(i, user){
                      
                    
                          var $tr = $('<tr>').append(
                          $('<td>').text('checkIN at'),
                          $('<td>').text(user.checkIN)).appendTo('#reportTable');
                         
                          //$("#emp_name").text(user.name);
                         // console.log(user.name);
                         $.each(data.checkOUT, function(i, user){
                      
                    
                          var $tr = $('<tr>').append(
                          $('<td>').text('checkOUT at'),
                          $('<td>').text(user.checkOUT)).appendTo('#reportTable');
                         
                          //$("#emp_name").text(user.name);
                         // console.log(user.name);
                         $.each(data.status, function(i, user){
                      
                    
                          var $tr = $('<tr>').append(
                          $('<td>').text('present at the Office'),
                          $('<td>').text(user.staus_flag)).appendTo('#reportTable');
                         
                          //$("#emp_name").text(user.name);
                         // console.log(user.name);

                      });

                      });

                      });

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