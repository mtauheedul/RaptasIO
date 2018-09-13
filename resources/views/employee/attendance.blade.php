<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Raptas IO</title>


  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 
<style>
body {
  background:#55535d;
  margin:0;
  padding:0;
}

input:focus, button:focus {
  outline:none;
  background:#55535d;
}

div {
  box-sizing:border-box;
}

.container {
  width:400px;
  background:#55535d;
  margin:0px auto;
  border-radius:8px;
  box-shadow:0 2px 5px 0 #ccc;
  padding-bottom:40px;
  color: #e2dada;
  box-shadow:0 5px 15px 0 #eee;
}

.header {
  width:100%;
  padding-top:40px;
  padding-bottom:10px;
}

.header::after {
  display:block;
  content:"";
  clear:both;
}

.header .input {
  width:80%;
  float:left;
  padding-left:10px;
  color: #e2dada;
}
.header .input input {
  width:100%;
  box-sizing:border-box;
  padding:8px;
  border:none;
  font-size:20px;
  font-weight:lighter;
  font-family:'Segoe UI';
  text-align:right;
  color: #e2dada;
  background:#55535d;
}
.header .reset {
  width:20%;
  float:right;
  padding-right:20px;
  font-style: normal;
  /*background:#161617;*/
}
.header .reset button {
  width:100%;
  padding:8px;
  border:none;
  background:transparent;
  font-size:25px;
  color:#d47943;
  font-size:20px;
  font-weight:lighter;
  font-family:'Segoe UI';
  font-style: normal;
}
.header .reset button:focus {
  background:#55535d;
  font-style: normal;
}


/*  */

.clock{
    text-align:center;
    width:auto;
    height:auto;
}


.body {
  background:#55535d;
  border-bottom-left-radius:20px;
  border-bottom-right-radius:20px;

  padding-top:0px;
  padding-bottom:0px;
  padding-left:44px;
  padding-right:6px;
  font-size: 18px;
      
}

.body .row {
  width:100%;
  padding:15px 0;
}

.body .row::after {
  display:block;
  content:"";
  clear:both;
} 


.body .row .col-3 {
  width:33.3333%;
  float:left;
  text-align: center;
}
.body .row .col-3 button {
  width:68px;
  height:68px;
  border-radius:100%;
  border:none;
  font-family:'montserrat';
  color:white;
  background:#55535d;
  font-size:30px;
  box-shadow:0 5px 5px 0 #eee;
}
.body .row .col-3 button:focus {
  background:#7e8691;
}

/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/






</style>
 
    
</head>
<body>

<div class="w3-container " style="background: #40b0d7; color:white; font-size: 20px; padding-top:0px;
  padding-bottom:35px;" align="center">
  <div style="clear: both">
    <h2 style="float: left; font-size: 40px;">Raptas IO </h2> 

    <h3 style="float: right;font-size: 60px;" id="currentTime">Heading 2</h3>

  </div>
  <div style="clear: both">
    <p style="float: left">Raptas Inc</p> 

    <p id="month" style="float: right; font-size: 15px;">Monday 2018</p>

  </div>

   
  
</div>


<div class="container">
 
@yield('content')
<div class="header">

  <label for="pass" align="center" style="color: white; font-size: 20px;">|ENTER YOUR PASSCODE HERE|</label>
<div class="input" align="right">
        
        <input style="color: white;   font-size: 18px;" class= "input" type="password" id="pass"  name="pass" maxlength="4"> 

      </div>
      <div class="reset" align="right">
        <button>

          <i class="icon " style="color: #e8ecec; font-style: normal;"  >Reset</i>
        </button>
      </div>
      <button   id="verify" name="verify" class="btn btn-info btn-lg btn-block"> Verify </button>

      

    </div>

<div class="body">
      <div class="row">
        <div class="col-3">
          <button>1</button>
        </div>
        <div class="col-3">
          <button>2</button>
        </div>
        <div class="col-3">
          <button>3</button>
        </div>
      </div>

      <div class="row">
        <div class="col-3">
          <button>4</button>
        </div>
        <div class="col-3">
          <button>5</button>
        </div>
        <div class="col-3">
          <button>6</button>
        </div>
      </div>  

      <div class="row">
        <div class="col-3">
          <button>7</button>
        </div>
        <div class="col-3">
          <button>8</button>
        </div>
        <div class="col-3">
          <button>9</button>
        </div>
      </div>  

      <div class="row">
        <div class="col-3">
          <button>||</button>
        </div>
        <div class="col-3">
          <button>0</button>
        </div>
        <div class="col-3">
          <button>||</button>
        </div>
      </div>    


      

    </div>

  </div>
 <!-- Modal -->
<div class="modal fade" id="attendance" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" align="center" style="font-size:32px; color: #40b0d7; ">WELCOME</h4>
              
              <h1 name="username" id="username" align="center" style="font-size:60px; color: #34b1ea; "></h1>
              <p  id="status" align="center" style="font-size:18px; color: #565f63; "></p>
            </div>
        
      
           
            <div class="modal-footer">
<button   id="checkInBtn" class="btn btn-primary btn-lg btn-block" style="display: none;" >Check IN</button>
<button   id="checkOutBtn" class="btn btn-danger btn-lg btn-block" style="display: none;" >Check OUT</button>
             <!--  <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button> -->

            </form>
            </div>
            </div>
</div>


<!-- <video id="video"></video>
    <canvas id="canvas"></canvas><br>
    <button onclick="snap();">Snap</button> -->
  


 


<script type="text/javascript">
  $(document).on('click','#edit',function(e){
    


       
       
    

});



$(document).ready(function () {

    $('.num').click(function () {
        var num = $(this);
        var text = $.trim(num.find('.txt').clone().children().remove().end().text());
        var telNumber = $('#pass');
        $(telNumber).val(telNumber.val() + text);
    });

});

var input = document.querySelectorAll(".input input")[0];
var reset = document.querySelectorAll(".reset button")[0];
var btn = document.querySelectorAll(".col-3 button");


for(var i = 0; i < btn.length; i++){
  btn[i].addEventListener('click', function(){

    var num1 = input.value;
    var num2 = this.childNodes[0].nodeValue;

    num = num1+num2;

    input.value = num;
  });
}

reset.addEventListener('click', function(){
  input.value = "";
});

$("#checkInBtn").click(function(e){
    e.preventDefault();

    var password = $('#pass').val();
    console.log(password);

    var data = {"pass":password};

    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        $.ajax({
                    type: "POST",
                    url: '/emp/attendance/IN',
                    dataType: 'json',
                    data : data,
                   
                    success: function (data) {
                      //alert("Here");
                      if(data.user2 === "OKIN")
                      {
                        //tempAlert("Checked In Success",5000);
                        //alert("Checked In Success");
                        $("#checkInBtn").hide();

                        location.reload();
                      }
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});

function tempAlert(msg,duration)
{
 var el = document.createElement("div");
 el.setAttribute("style","position:absolute;top:0%;left:0%;background-color:white;");
 el.innerHTML = msg;
 setTimeout(function(){
  el.parentNode.removeChild(el);
 },duration);
 document.body.appendChild(el);
}
        

$("#checkOutBtn").click(function(e){
    e.preventDefault();

    var password = $('#pass').val();
    console.log(password);

    var data = {"pass":password};

    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        $.ajax({
                    type: "POST",
                    url: '/emp/attendance/OUT',
                    dataType: 'json',
                    data : data,
                   
                    success: function (data) {
                      //alert("Here");
                      if(data.user2 === "OKOUT")
                      {
                        $("#checkOutBtn").hide();
                        //alert("Checked OUT Success");
                        location.reload();
                      }
                      
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});
  
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

// setInterval(function(){blink()}, 1000);
// function blink() {
//         $("#checkOutBtn").fadeTo(1000, 0.1).fadeTo(2000, 1.0);
//         $("#checkInBtn").fadeTo(1000, 0.1).fadeTo(2000, 1.0);
//     }

$("#verify").click(function(e){
    e.preventDefault();
  
    var password = $('#pass').val();
    console.log(password);

    var data = {"pass":password};

    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        $.ajax({
                    type: "POST",
                    url: '/verify',
                    dataType: 'json',
                    data : data,
                   
                    success: function (data) {
                      //alert("Here");
                      if(data.user2 === "passout")
                      {
                        alert("pass incorrect");

                      }
                      else
                      {
                        //alert("pass correct");
                      }
                      if(data.user2 === "in")
                      {
                         $("#checkOutBtn").hide();
                         $('#attendance').find('#username').text(data.user3);
                         $('#attendance').find('#status').text("Your are check out before so check in now thank you");
                        
                        //alert("button 1 active");
                        
                        $("#checkInBtn").show();

                              setInterval(function() {
                              setTimeout(function() {
                                  $("#checkInBtn").fadeTo(1000, 0.1).fadeTo(2000, 1.0);
                              }, 500);
                              }, 500);
                       
                        $('#attendance').modal('show');
                        
                      }
                      if(data.user2 === "out")
                      {
                         $("#checkInBtn").hide();
                        $('#attendance').find('#username').text(data.user3);
                       $('#attendance').find('#status').text("Your are check in before so check out now thank you");
                        //alert("button 2 active");
                        
                        $("#checkOutBtn").show();
                        setInterval(function() {
                        setTimeout(function() {
                            $("#checkOutBtn").fadeTo(1000, 0.1).fadeTo(2000, 1.0);
                                          }, 500);
                                           }, 500);
                       
                         $('#attendance').modal('show');
                         
                      }
                     },
                    error: function (error) {
                      //alert(error);
                    }
                });

   
});


                



  
 
</script>



</body>
</html>
