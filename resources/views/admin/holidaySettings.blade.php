
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

    <h1 style="font-size: 40px; color: #6cb2eb;">Holiday Settings</h1>


<div style="position: relative">

      <strong>Select Day</strong>

      <input id="selDay" class="timepicker form-control" type="text">

       <strong>Holiday Type</strong>

      <input id="type" class="form-control" type="text" placeholder="Public Holiday">

      <strong>Holiday Details</strong>

      <input id="details" class="form-control" type="text">



      <button  id="addHoliday" name="addHoliday" class="btn btn-info "> Save Holiday </button>
     

</div>

    <div style="position: relative">
                
<table id="leave">
                  
                  <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Details</th>
                
                    <th>Action</th>
                    
                  </tr>
                  

                  @foreach ($records as $item)

                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->holiday_date}}</td>
                          <td>{{$item->holidayType}}</td>
                          <td>{{$item->details}}</td>
                         
                          

                          
                          
                          <td> 
                                       
                            <a href="#" class="btn btn-danger btn-xs" id="appDelete" data-id="{{$item->id}}"> Delete This Holiday</a>
                          </td>
                          
                          
                   
                    
      
                   
                   
                          </tr>
                   @endforeach

</table>
  

    </div>

</div>

<script type="text/javascript">

    $('.timepicker').datetimepicker({
       format: 'DD/MM'
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

$('body').delegate('#leave #appDelete','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     
    
    $.post('{{ URL("/holidayDelete")}}',{id:id},function(data){
      
      alert('Holiday Deleted');
        location.reload();
      

      

});

});

$("#addHoliday").click(function(e){
    e.preventDefault();
  
    var day = $('#selDay').val();
    var type = $('#type').val();
    var details = $('#details').val();
   
   
    

    

    var data = {   
                  "day":day,
                  "type":type,
                  "details":details
               };

    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        $.ajax({
                    type: "POST",
                    url: '/holidayAdd',
                    dataType: 'json',
                    data : data,
                   
                    success: function (data) {
                  alert("Holiday Save Successfully");
                  location.reload();
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});





</script>  

@endsection  