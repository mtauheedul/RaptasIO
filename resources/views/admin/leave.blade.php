
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
	  <button  id="setLeaveBtn" name="setLeaveBtn" class="btn btn-info "> Set Fixed </button>
</div>
</div>
<div class="column">
	
<div class="card">
 
<div class="container">
  @foreach ($leaveRecords as $item)
  @if($item->status == 'active')
                          
                            <h4><b id="days" style="font-size: 40px; color: #6cb2eb;">{{$item->total_days}} Days</b></h4>
                            <p>Total Yearly Leave</p>
  @endif
  @endforeach

    
</div>
</div>



<table id="yearly_table">
                  
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
                    @if($item->status == 'active')
                    <td id="act" style="color: #13ec6f; font-size: 20px">{{$item->status}}<a href="#" style="color: white;" class="btn btn-primary btn-xs" id="deactive"  data-id="{{$item->id}}"> Deactivate </a></td>
                    @else
                    <td id="" style="color: blue; font-size: 20px">{{$item->status}}</td>
                    @endif
                    <td>
                      <a href="#" style="color: white;" class="btn btn-info btn-xs" id="active"  data-id="{{$item->id}}"> Set Active </a>
                      <a href="#" class="btn btn-danger btn-xs" id="dayDelete" data-id="{{$item->id}}"> Delete This </a>
                    </td>
                  </tr>
@endforeach
</table>
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

      <input id="leaveReason" class="form-control" type="text">



      <button  id="apply" name="apply" class="btn btn-info "> Applying For Leave  </button>
     

</div>

    <div style="position: relative">
                

                <table id="reportTable2">
                  
                  <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Leave Starts From</th>
                    <th>Leave Ends</th>
                    <th>Total Leave Days</th>
                    <th>Leave Reasons</th>
                    <th>Approval Status</th>
                    <th>Action</th>
                  </tr>
                  
@foreach ($leaveTable as $item)
                  <tr>
                    <td>{{$item->emp_id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->from_date}}</td>
                    <td>{{$item->to_date}}</td>
                    <td>{{$item->days}}</td>
                    <td>{{$item->leave_reason}}</td>
                    @if($item->approval == 'pending')
                     <td id="appAct" style="color: blue; font-size: 20px">{{$item->approval}}<a href="#" style="color: white;" class="btn btn-primary btn-xs" id="approved"  data-id="{{$item->id}}"> Make Approved </a></td>
                    @else
                    <td id="" style="color: blue; font-size: 20px">{{$item->approval}}</td>
                    @endif
                    <td>
                      <a href="#" style="color: white;" class="btn btn-info btn-xs" id="NotApproved"  data-id="{{$item->id}}"> Not Approved </a>
                      <a href="#" class="btn btn-danger btn-xs" id="leaveDelete" data-id="{{$item->id}}"> Delete This Record </a>
                    </td>
                  </tr>
@endforeach

                </table>
  

    </div>

</div>

<script type="text/javascript">

    $('.timepicker').datetimepicker({
}); 

setInterval(function(){blink()}, 1000);
function blink() {
        $("#act").fadeTo(1000, 0.1).fadeTo(2000, 1.0);
        $("#deactive").fadeTo(2000, 0.1).fadeTo(1000, 1.0);
       
    }

$(document).ready(function(){
    $("#nameSelector").change(function(){

       $("#for").show();
       $("#selectedEmp").show();
        val = $("#nameSelector option:selected").text();
        $("#selectedEmp").text(val);
        //alert(val);
    });
});

$('body').delegate('#yearly_table #active','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/YearDaysSetActive")}}',{id:id},function(data){
        alert('Set To Active');
        location.reload();

});

});

$('body').delegate('#yearly_table #deactive','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/YearDaysSetInActive")}}',{id:id},function(data){
        alert('Set To InActive');
        location.reload();

});

});

$('body').delegate('#yearly_table #dayDelete','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/YearDaysDelete")}}',{id:id},function(data){
        alert('Successfully Deleted');
        location.reload();

});

});

$("#setLeaveBtn").click(function(e){
    e.preventDefault();
  
    var value = $('#setLeave').val();
    
    
//alert(name);
    

    var data = {   "value":value
                    
                    
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
                      
                    
                    $('#days').text('Currently Days Set To' + ' : ' +data.value+ ' : Days But its status is still Pending');

                     alert('Currently Days Set To' + ' : ' +data.value+ ' : Days But its status is still Pending'); 
                    location.reload();  
                            
                    
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});

$("#apply").click(function(e){
    e.preventDefault();
  
    var starts = $('#frmInput').val();
    var ends = $('#toInput').val();
    var reasons = $('#leaveReason').val();
    var id = $('#nameSelector').val();
    
var date1 = new Date(starts);
var date2 = new Date(ends);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
//alert(diffDays);

    

    var data = {   "starts":starts,
                    "ends": ends,
                    "id":id,
                    "reasons": reasons,
                    "days":diffDays
                    
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
                      
                       // $.each(data.user2, function(i, user){
                      
                    
                      //     var $tr = $('<tr>').append(
                      //       $('<td>').text(user.emp_id),
                      //       $('<td>').text(user.from_date),
                      //       $('<td>').text(user.to_date),
                      //       $('<td>').text(user.days),
                      //       $('<td>').text(user.leave_reason),
                      //       $('<td>').text(user.approval)).appendTo('#reportTable2');
                          
                          
                          

                      // });
                      location.reload();
                      
                       
                       
                       
                      
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});


$('body').delegate('#reportTable2 #approved','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/LeaveSetActive")}}',{id:id},function(data){
        alert('Set To Active');
        location.reload();

});
});


$('body').delegate('#reportTable2 #NotApproved','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/LeaveSetInActive")}}',{id:id},function(data){
        alert('Set To Not Approved');
        location.reload();

});
});


$('body').delegate('#reportTable2 #leaveDelete','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/LeaveDelete")}}',{id:id},function(data){
        alert('Request Deleted');
        location.reload();

});
});


</script>  

@endsection  