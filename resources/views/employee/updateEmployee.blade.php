@extends('layouts.app')
@section('content')
<section class="content-header">
<div class="w3-container " style="background: #40b0d7; color:white; font-size: 20px; padding-right: 40px; 
  " align="center"> 
   <h2>Update Employee Details</h2>
</div>
<div class="w3-container">
          
         
          <br>
            <button class="btn btn-info pull-left" data-toggle="modal" data-target="#myModal" style="display: none;" id="empAddBtn"> Add Employee</button>
         <br>
            
            <br>
          <table class="table table-bordered table-striped table-condensed"  id="showTable" >
                
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>CheckIN</th>
                    <th>CheckOUT</th>
                    <th>Status</th>
                </tr>
            </thead>
                                    <tbody id="employee_info">
                                    @foreach ($records as $item)
                                    <tr id="{{$item->id}}">
                                        <td> {{$item->id}}</td>
                                        <td> {{$item->name}}</td>
                                        <td> {{$item->designation}}</td>
                                        <td> {{$item->email}}</td>
                                        <td> {{$item->password}}</td>
                                        <td> {{$item->checkIN}}</td>
                                        <td> {{$item->checkOUT}}</td>
                                        <td> {{$item->staus_flag}}</td>
                                        
                                        <td> 
                                       <!--  <a href="#" class="btn btn-info btn-xs" id="view" data-id="{{$item->id}}"> View </a> -->
                                        <a href="#" class="btn btn-success btn-xs" id="edit" data-toggle="modal" data-target="#employee_update" data-id="{{$item->id}}"> Edit </a>
                                        <!-- <form action="{{ URL::to('/destroy') }}" method="POST" id="frm_update">
                                            <a type="text" style="display: none;" id="grab_id">{{$item->id}}</a> -->
                                        <a type="submit" class="btn btn-danger btn-xs" id="delete" data-id="{{$item->id}}"> Delete </a>
                                        <!-- </form> -->
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                    </tbody>
          </table>

          
        
</div>
<div>
    <!-- Button trigger modal -->


 <!-- Modal -->
<div class="modal fade" id="employee_update" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update Employees</h4>
            </div>
        <form action="{{ URL::to('/doneupdateEmp') }}" method="POST" id="frm_update">
            <!-- <form  id="frm_update"> -->
                @csrf
            <div class="modal-body">
                    <div class="col-4-md">
                            <div class="form-group">
                                <label>Employee ID :</label>
                                <input type="text" name="empID" class="form-control" id="empID">
                            </div>
                        </div>
              <div class="col-4-md">
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="username" class="form-control" id="username">
                  </div>
              </div>
              <div class="col-4-md">
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" id="designation">
                    </div>
                </div>
                <div class="col-4-md">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="col-4-md">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" id="password">
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-info pull-left" id="subUpdate"value="Update">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </form>
            </div>
            </div>
</div>
</section>
     <!--  <button type="submit" id="t1" data-toggle="modal" data-target="#exampleModalCenter"> Ajaira Button </button> -->


<script type="text/javascript">


    var a1="";
    var a2="";
    var a3="";
    var a4="";
    var a5="";

    $("#t1").click(function(){
        //alert("sda");
        $("#exampleModalCenter").modal('show');
    });



$(document).on('click','#edit',function(e){
    
    var id = $(this).data('id');
    

    var table = document.getElementsByTagName("table")[0];
    var tbody = table.getElementsByTagName("tbody")[0];
tbody.onclick = function (e) 
{
    e = e || window.event;
    var data = [];
    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) {
        var cells = target.getElementsByTagName("td");
        for (var i = 0; i < cells.length; i++) {
            data.push(cells[i].innerHTML);
            
        }
    }
    //alert(cells[2].innerHTML);
    a1=cells[1].innerHTML;
    a2=cells[2].innerHTML;
    a3=cells[3].innerHTML;
    a4=cells[4].innerHTML;
    a5=cells[0].innerHTML;

};

        $('#frm_update').find('#empID').val(a5);
        $('#frm_update').find('#username').val(a1);
        $('#frm_update').find('#designation').val(a2);
        $('#frm_update').find('#email').val(a3);
        $('#frm_update').find('#password').val(a4);
        $('#employee_update').modal('show');
    

});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// $(document).on('click','#delete',function(e){
    
    
// var id = $(this).data('id');
//     var table = document.getElementsByTagName("table")[0];
//     var tbody = table.getElementsByTagName("tbody")[0];

//     tbody.onclick = function (e) 
//     {
//         e = e || window.event;
//         var data = [];
//         var target = e.srcElement || e.target;
//         while (target && target.nodeName !== "TR") {
//             target = target.parentNode;
//         }
//         if (target) {
//             var cells = target.getElementsByTagName("td");
//             for (var i = 0; i < cells.length; i++) {
//                 data.push(cells[i].innerHTML);
                
//             }
//         }
       
//         a5=cells[0].innerHTML;

//     };

//     $('#grab_id').find('#empID').val(a5);

    
// });
$('body').delegate('#employee_info #delete','click',function(e){
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var id = $(this).data('id');
     //alert(id);
    
    $.post('{{ URL("/destroy")}}',{id:id},function(data){
        alert('This ID is deleted : '+id + 'Please Refresh The Page');
        location.reload();

});

});


</script>

@endsection





