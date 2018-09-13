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
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>



<div class="container">

    <h1>Working Hour Settings</h1>

    <div style="position: relative">
      <div class="w3-container w3-teal" align="center">
        
  
  
      </div>
      
 
      

      <strong>Start Time:</strong>

      <input id="starts" class="form-control" type="text">

</div>
<div style="position: relative">

      <strong>End Time:</strong>

      <input id="ends" class="form-control" type="text">
      <strong>Maximum </strong>

      <input id="minimum" class="form-control" type="text">
      
      

      
      <button  id="saveWork" name="saveWork" class="btn btn-primary btn-lg btn-block"> Save Working Hour </button>
      

</div>
<h1>Working Hour Data Details</h1>
    <div style="position: relative">
                

                <table id="saveTable">
                  <tr>
                    <th>Office ID</th>
                    <th>Office Hour Starts From</th>
                    <th>Office Hour Ends</th>
                    <th>Minimum Time</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                  

                  
                    @foreach ($records as $item)

                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->starts}}</td>
                          <td>{{$item->ends}}</td>
                          <td>{{$item->minimum}}</td>

                          @if($item->status != 'active')
                          {
                            <td id="act2" style="color: blue;">{{$item->status}}</td>
                          }
                          
                          @else
                          {
                            
                            <td id="act" style="color: red; font-size: 20px">{{$item->status}}<a href="#" style="color: white;" class="btn btn-info btn-xs" id="deactive"  data-id="{{$item->id}}"> Deactivate </a></td>
                            
                          }
                          @endif
                          
                          <td> 
                                       <a href="#" class="btn btn-success btn-xs" id="edit"  data-id="{{$item->id}}"> Set Active </a>
                                       <a href="#" class="btn btn-danger btn-xs" id="delete" data-id="{{$item->id}}"> Delete This </a>
                          </td>
                          
                          
                   
                    
      
                   
                   
                  </tr>
                   @endforeach

                </table>
  

    </div>

</div>

<script type="text/javascript">

setInterval(function(){blink()}, 1000);
function blink() {
        $("#act").fadeTo(1000, 0.1).fadeTo(2000, 1.0);
        $("#deactive").fadeTo(2000, 0.1).fadeTo(1000, 1.0);
    }

// $('#flip_2').on('change', function() {
//         alert('active');
//     });

// if(document.getElementById('flip_2').checked) {
//         alert('active');
//     } else {
//         alert('Not active');
//     }

// $(document).ready(function(){
//     $("#nameSelector").change(function(){
//        $("#for").show();
//        $("#selectedEmp").show();
//         val = $("#nameSelector option:selected").text();
//         $("#selectedEmp").text(val);
//         //alert(val);
//     });
// });

$("#saveWork").click(function(e){
    e.preventDefault();
  
    var starts = $('#starts').val();
    var ends = $('#ends').val();
    var minimum = $('#minimum').val();
    var status = 'inactive';
    

    var data = {   "starts":starts,
                    "ends": ends,
                    "minimum":minimum,
                    "status":status
                };

    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        $.ajax({
                    type: "POST",
                    url: '/SetWorkHour',
                    dataType: 'json',
                    data : data,
                   
                    success: function (data) {
                      // $('#saveTable tbody').empty();
                       
                      if(data.user2 === "YES")
                      {
                        alert("Saved Successfully");
                        location.reload();
                      }
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

$('body').delegate('#saveTable #edit','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/SetActive")}}',{id:id},function(data){
        alert('Set To Active');
        location.reload();

});

});

$('body').delegate('#saveTable #deactive','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/SetDeActive")}}',{id:id},function(data){
        alert('Set To Deactive');
        location.reload();

});

});

$('body').delegate('#saveTable #delete','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/DeleteState")}}',{id:id},function(data){
        alert('State Deleted');
        location.reload();

});

});



</script>  

 @endsection 