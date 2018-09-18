
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
	  <button  id="setYearly" name="setYearly" class="btn btn-info "> Set Fixed </button>
</div>
</div>
<div class="column">
	
<div class="card">
 
<div class="container">
  @foreach ($leaveRecords as $item)
  @if($item->status == 'active')
  
                            <h4><b id="days" style="font-size: 40px; color: #6cb2eb;">{{$item->total_days}} Days</b></h4>
  
                          @endif
    
  @endforeach
    <p>Total Yearly Leave</p>
</div>
</div>
<table id="yearly">
                  
                  <tr>
                    <th>ID</th>
                    <th>Total Days</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                  

                  @foreach ($leaveRecords as $item)

                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->total_days}}</td>
                          

                          @if($item->status != 'active')
                          
                            <td id="act2" style="color: blue;">{{$item->status}}</td>
                          
                          
                          @else
                          
                            
                            <td id="act" style="color: red; font-size: 20px">{{$item->status}}<a href="#" style="color: white;" class="btn btn-info btn-xs" id="deactive"  data-id="{{$item->id}}"> Deactivate </a></td>
                            
                          
                          @endif
                          
                          <td> 
                                       <a href="#" class="btn btn-success btn-xs" id="editLeave"  data-id="{{$item->id}}"> Set Active </a>
                                       <a href="#" class="btn btn-danger btn-xs" id="deleteLeave" data-id="{{$item->id}}"> Delete This </a>
                          </td>
                          
                          
                   
                    
      
                   
                   
                          </tr>
                   @endforeach

</table>
</div>
   

    

</div>

<div class="container">

    <h1 style="font-size: 40px; color: #6cb2eb;">Applying  Leave Here</h1>

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

      <input id="leaveReason" class="form-control" type="text">



      <button  id="applyLeave" name="applyLeave" class="btn btn-info "> Apply For Leave </button>
     

</div>

    <div style="position: relative">
                
<table id="leave">
                  
                  <tr>
                    <th>Employee Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Total Days</th>
                    <th>Leave Reason</th>
                    <th>Approval</th>
                    <th>Action</th>
                    
                  </tr>
                  

                  @foreach ($leaveTable as $item)

                        <tr>
                          <td>{{$item->name}}</td>
                          <td>{{$item->from_date}}</td>
                          <td>{{$item->to_date}}</td>
                          <td>{{$item->days}}</td>
                          <td>{{$item->leave_reason}}</td>
                          

                          @if($item->approval != 'approved')
                          
                            <td id="act2" style="color: blue;">{{$item->approval}}</td>
                          
                          
                          @else
                          
                            
                            <td id="act" style="color: red; font-size: 20px">{{$item->approval}} </td> 
                            
                          
                          @endif
                          
                          <td> 
                                       <a href="#" class="btn btn-success btn-xs" id="appEdit"  data-id="{{$item->id}}"> Make Approved </a>
                                       <a href="#" class="btn btn-danger btn-xs" id="appDelete" data-id="{{$item->id}}"> Delete This Record</a>
                          </td>
                          
                          
                   
                    
      
                   
                   
                          </tr>
                   @endforeach

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


$("#setYearly").click(function(e){
    e.preventDefault();
  
    var setLeave = $('#setLeave').val();
   // alert(setLeave);
   
    

    

    var data = {   
                  "setLeave":setLeave
               };

    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        $.ajax({
                    type: "POST",
                    url: '/setYearlyLeave',
                    dataType: 'json',
                    data : data,
                   
                    success: function (data) {
                  alert("Data Save Successfully");
                  location.reload();
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});


$("#applyLeave").click(function(e){
    e.preventDefault();
  var id=$('#nameSelector').val();
  //alert(id);
    //var selectedEmp = $('#selectedEmp').val();
    var starts = $('#frmInput').val();
    var ends = $('#toInput').val();
    var leaveReason = $('#leaveReason').val();
   // alert(setLeave);
   
var date1 = new Date(starts);
var date2 = new Date(ends);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
var days =diffDays;

    

    var data = {   
                  "id":id,
                  "starts":starts,
                  "ends":ends,
                  "leaveReason":leaveReason,
                  "days":days

               };

    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        $.ajax({
                    type: "POST",
                    url: '/ApplyForLeave',
                    dataType: 'json',
                    data : data,
                   
                    success: function (data) {
                  alert("Apply Aplication is submitted to Admin");
                  location.reload();
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});

$('body').delegate('#leave #appEdit','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/LeaveSetActive")}}',{id:id},function(data){
        alert('Set To Approved');
        location.reload();

});

});

$('body').delegate('#leave #appDelete','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     alert(id);
    
    $.post('{{ URL("/LeaveDelete")}}',{id:id},function(data){
      
          alert('Deleted');
        location.reload();
      

      

});

});

$('body').delegate('#yearly #deactive','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/yearlySetDeactive")}}',{id:id},function(data){
        alert('Set To Deactive');
        location.reload();

});

});


$('body').delegate('#yearly #editLeave','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/yearlySetActive")}}',{id:id},function(data){
        alert('Set To Active');
        location.reload();

});

});

$('body').delegate('#yearly #deleteLeave','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/yearlySetDelete")}}',{id:id},function(data){
        alert('Deleted');
        location.reload();

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