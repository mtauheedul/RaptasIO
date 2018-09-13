@extends('layouts.app')
@section('content')



<section class="content-header">
      <h1>
        Raptas IO Attendance Dashboard 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="total_employee">0</h3>

              <p>Total Employee</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Checkout List <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0<sup style="font-size: 20px">%</sup></h3>

              <p>Daily Attendance Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Checkout Report <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">User info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>1</h3>

              <p>Total Attendance Device</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Attendance Devices <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
           <div class="box-header">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title">Live Attendance Window</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                </div>
              </div>
            </div>
            <div class="box-body chat" id="chat-box" style="background: white;">
              <!-- chat item -->
              <div class="item">
                <p  class="online" id="emp_name" name="emp_name"></p>

                <p class="message" id="att_time">
                  <a href="#" class="name" >
                    <small class="text-muted pull-right" ><i class="fa fa-clock-o"></i> </small>
                    
                  </a>
                   
                </p>
                
              </div>
              <h1 id="in" style="color: #6cb2eb;"> Live Check IN Status </h1>
              <table id="records_table" name="records_table">
                <thead>
                    <tr>
                      <th>Name</th>
                      <th>Check IN</th>
                     
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>Waiting...</td>
                        <td>Waiting...</td>
                       
                    </tr>
                  </tbody>
                    
              </table>

              <h1 id="out" style="color: #38c172;"> Live Check Out Status </h1>
               <table id="records_table_out" name="records_table_out">
                <thead>
                    <tr>
                      <th>Name</th>
                   
                      <th>Check OUT</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>Waiting...</td>
                      
                        <td>Waiting...</td>
                    </tr>
                  </tbody>
                    
              </table>
              <!-- /.item -->
              <!-- chat item -->
              
              <!-- /.item -->
              <!-- chat item -->
            
              <!-- /.item -->
            </div>
            <!-- /.chat -->  


 </section>
       <!--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Live Window -->

          <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// END -->
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          
          <div class="column">
       <div class="box box-success">
         
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
    background-color: #40b0d7;
}
</style>
<h1> Employee Details </h1>
<table>
  <tr>
    <th>Employee Name</th>
    <th>Designation</th>
    <th>Email</th>
    <th>Check IN</th>
    <th>Check OUT</th>
    <!-- <th>Password</th> -->
  </tr>
  @foreach ($records as $item)

  <tr>
    <td>{{$item->name}}</td>
    <td>{{$item->designation}}</td>
    <td>{{$item->email}}</td>
    <td>{{$item->checkIN}}</td>
    <td>{{$item->checkOUT}}</td>
    <!-- <td>{{$item->password}}</td> -->
  </tr>
 @endforeach
</table>



          </div>
       </div>
          <!-- /.box -->

          <!-- solid sales graph -->
       
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar & Public Holidays</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
               <table class="publicholidays phgtable ">
<thead><tr>
<th>Date</th>
<th>Day</th>
<th>Holiday</th>
</tr></thead>
<tbody>
<tr class="even ">
<td>21 Feb</td>
<td>Wed</td>
<td>
<a href="https://publicholidays.asia/bangladesh/shaheed-day/" class="summary url">Shaheed Day</a> </td>
</tr>
<tr class="odd ">
<td>17 Mar</td>
<td>Sat</td>
<td>
<a href="https://publicholidays.asia/bangladesh/sheikh-mujibur-rahmans-birthday/" class="summary url">Sheikh Mujibur Rahman's Birthday</a> </td>
</tr>
<tr class="even ">
<td>26 Mar</td>
<td>Mon</td>
<td>
<a href="https://publicholidays.asia/bangladesh/independence-day/" class="summary url">Independence Day</a> </td>
</tr>
<tr class="odd ">
<td>14 Apr</td>
<td>Sat</td>
<td>
<a href="https://publicholidays.asia/bangladesh/bengali-new-year/" class="summary url">Bengali New Year</a> </td>
</tr>
<tr class="even ">
<td>29 Apr</td>
<td>Sun</td>
<td>
<a href="https://publicholidays.asia/bangladesh/buddha-purnima/" class="summary url">Buddha Purnima</a> </td>
</tr>
<tr class="odd ">
<td>1 May</td>
<td>Tue</td>
<td>
<a href="https://publicholidays.asia/bangladesh/may-day/" class="summary url">May Day</a> </td>
</tr>
<tr class="even ">
<td>2 May</td>
<td>Wed</td>
<td>
<span class="summary">Shab e-Barat</span> </td>
</tr>
<tr class="odd ">
<td>13 Jun</td>
<td>Wed</td>
<td>
<span class="summary">Laylat al-Qadr</span> </td>
</tr>
<tr class="even ">
<td>15 Jun</td>
<td>Fri</td>
<td>
<span class="summary">Jumatul Bidah</span> </td>
</tr>
<tr class="odd ">
<td>15 Jun</td>
<td>Fri</td>
<td>
<a href="https://publicholidays.asia/bangladesh/eid-ul-fitr/" class="summary url">Eid ul-Fitr Holiday</a> </td>
</tr>
<tr class="even ">
<td>16 Jun</td>
<td>Sat</td>
<td>
<a href="https://publicholidays.asia/bangladesh/eid-ul-fitr/" class="summary url">Eid ul-Fitr</a> </td>
</tr>
<tr class="odd ">
<td>17 Jun</td>
<td>Sun</td>
<td>
<a href="https://publicholidays.asia/bangladesh/eid-ul-fitr/" class="summary url">Eid ul-Fitr Holiday</a> </td>
</tr>
<tr class="even ">
<td>15 Aug</td>
<td>Wed</td>
<td>
<a href="https://publicholidays.asia/bangladesh/national-mourning-day/" class="summary url">National Mourning Day</a> </td>
</tr>
<tr class="odd ">
<td>21 Aug</td>
<td>Tue</td>
<td>
<a href="https://publicholidays.asia/bangladesh/eid-ul-adha/" class="summary url">Eid ul-Adha Holiday</a> </td>
</tr>
<tr class="even ">
<td>22 Aug</td>
<td>Wed</td>
<td>
<a href="https://publicholidays.asia/bangladesh/eid-ul-adha/" class="summary url">Eid ul-Adha</a> </td>
</tr>
<tr class="odd ">
<td>23 Aug</td>
<td>Thu</td>
<td>
<a href="https://publicholidays.asia/bangladesh/eid-ul-adha/" class="summary url">Eid ul-Adha Holiday</a> </td>
</tr>
<tr class="even ">
<td>2 Sep</td>
<td>Sun</td>
<td>
<a href="https://publicholidays.asia/bangladesh/shuba-janmashtami/" class="summary url">Shuba Janmashtami</a> </td>
</tr>
<tr><td colspan="3" class="adunit">


        <div id="phgadunit_54114"></div>
</td></tr>
<tr class="odd ">
<td>21 Sep</td>
<td>Fri</td>
<td>
<a href="https://publicholidays.asia/bangladesh/ashura/" class="summary url">Ashura</a> </td>
</tr>
<tr class="even ">
<td>19 Oct</td>
<td>Fri</td>
<td>
<a href="https://publicholidays.asia/bangladesh/vijaya-dashami/" class="summary url">Vijaya Dashami</a> </td>
</tr>
<tr class="odd ">
<td>21 Nov</td>
<td>Wed</td>
<td>
<a href="https://publicholidays.asia/bangladesh/eid-e-milad-un-nabi/" class="summary url">Eid-e-Milad un-Nabi</a> </td>
</tr>
<tr class="even ">
<td>16 Dec</td>
<td>Sun</td>
<td>
<a href="https://publicholidays.asia/bangladesh/victory-day/" class="summary url">Victory Day</a> </td>
</tr>
<tr class="odd ">
<td>25 Dec</td>
<td>Tue</td>
<td>
<a href="https://publicholidays.asia/bangladesh/christmas/" class="summary url">Christmas Day</a> </td>
</tr>
</tbody>
</table>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    <!-- <a class="btn btn-info btn-lg"  id="alert-target" >Click me!</a> -->
    </section>
    <!-- /.content -->
<script type="text/javascript">

 setInterval(function() {
                        setTimeout(function() {
                            $("#in").fadeTo(1000, 0.1).fadeTo(2000, 1.0);
                            $("#out").fadeTo(1000, 0.1).fadeTo(2000, 1.0);
                                          }, 500);
                                           }, 500);


  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  

setInterval(function() {

var c=0;
                $.ajax({
                    type: "GET",
                    url: '/countEmp',

                   
                    success: function (data) {
                       $.each(data.user2, function(i, user){
                        $("#total_employee").text(++c);
                        //$("#att_time").text(user.checkIN);
                        //$("#emp_name").text(user.name);
                        //console.log(user.checkIN);
                          var $tr = $('<tr>').append(
                          $('<td>').text(user.name),
                          $('<td>').text(user.checkIN)).appendTo('#records_table');
                         
                          //$("#emp_name").text(user.name);
                         // console.log(user.name);

                      });
                       $.each(data.user3, function(i, user){
                        $("#total_employee").text(++c);
                        //$("#att_time").text(user.checkIN);
                        //$("#emp_name").text(user.name);
                        //console.log(user.checkIN);
                          var $tr = $('<tr>').append(
                          $('<td>').text(user.name),
                      
                          $('<td>').text(user.checkOUT)).appendTo('#records_table_out');
                          //$("#emp_name").text(user.name);
                         // console.log(user.name);

                      });
                       // $("#emp_name").text("Live Data Feed");
                      
                       
                    },
                    error: function (error) {
                      //alert(error);
                    }
                });

    // $("#emp_name").text(": LIVE :");
 //$("#att_time").text("Live Data Feed");
 $('#records_table tbody').empty();
 $('#records_table_out tbody').empty();
}, 10000);


//    $("#alert-target").click(function(event){
    
//     var c=0;
//                 jQuery.ajax({
//                     type: "GET",
//                     url: '/countEmp',
// //                url: '#',
                   
//                     success: function (data) {
//                       console.log(data);
//                        $.each(data.user2, function(i, user){
//                         $("#total_employee").text(++c);
//                         $("#att_time").text(user.checkOUT);
//                         $("#emp_name").text(user.name);

//                       });
                        
                       
//                     },
//                     error: function (error) {
//                       //alert(error);
//                     }
//                 });
   
//    });
  
 
</script>
        
 @endsection  



