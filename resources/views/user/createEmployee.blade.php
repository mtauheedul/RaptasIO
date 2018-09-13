@extends('layouts.app')

@section('content')
<!-- <!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> -->

<div class="w3-container " style="background: #40b0d7; color:white; font-size: 20px; padding-right: 40px; 
  " align="center">
  <h2>Create New Employee</h2>
</div>
<div class="w3-container">
  <form method="POST" action="{{ URL::to('store/emp')}}">
    @csrf
    
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="designation">Designation:</label>
      <input type="text" class="form-control" id="designation" placeholder="Enter Employee Designation" name="designation">
    </div>
    <div class="form-group">
      <label for="phone">Phone No:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Phone No" name="phone">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
   
    <button type="submit" class="btn btn-info btn-lg pull-right">SAVE</button>
  </form>
</div>
<!-- <a class="btn btn-info btn-lg" id="alert-target" >Click me!</a>



<script type="text/javascript">
$(document).ready(function(){
   $("#alert-target").click(function(event){
   alert("asd");
   });
   });
 
</script> -->
<!-- </body>
</html> -->
@endsection