@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/* Style the buttons */
.btn {
    border: none;
    outline: none;
    padding: 12px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
}

.btn:hover {
    background-color: #ddd;
}

.btn.active {
    background-color: #666;
    color: white;
}
</style>
</head>
<body>

<h2>User Dashboard To See Employee List </h2> 

<form class="form-horizontal" action="{{ URL::to('new/emp')}}" method="GET">
  <div class="controls">
          <button id= "goBackButton" class="btn btn-success">Create New Employee</button>
      </div>
</form>
<div id="btnContainer">
<button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 

</div>
<br>
@foreach ($records as $item)
  
<div class="row pull-right" >
  <div name ="t1" class="column" style="background-color:#aaa;">
    <h2>Employee Name :</h2><p>{{$item->name}}</p>
    <h2>Employee designation : </h2><p>{{$item->designation}}</p>
    <h2>Employee Email : </h2><p>{{$item->email}}</p>
    <h2>Employee Check IN : </h2><p>{{$item->checkIN}}</p>
    <h2>Employee Check Out : </h2><p>{{$item->checkOUT}}</p>
    <h2>Employee Password : </h2><p>{{$item->password}}</p>
    
    
    <form class="form-horizontal" action='submitEmployee' method="GET">
      <div class="controls">
              <button id= "goBackButton" class="btn btn-success">Edit</button>
          </div>
    </form>

    <h3>______________________________________________________________________</h3>
  </div>
  
</div>    
@endforeach





</body>
</html>




@endsection