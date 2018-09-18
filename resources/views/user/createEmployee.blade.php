@extends('layouts.app')

@section('content')


<div class="w3-container " style="background: #40b0d7; color:white; font-size: 20px; padding-right: 40px; 
  " align="center">
  <h2>Create New Employee</h2>
</div>
<div class="w3-container" style="background: #40b0d7; color:white; font-size: 20px; padding-left: 80px; padding-right: 80px; padding-bottom: 80px;" >
  <form method="POST" action="{{ URL::to('store/emp')}}">
    @csrf
    
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Enter email" name="email">
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
   
    <button type="submit" class="form-control btn btn-primary ">SAVE</button>
  </form>
</div>


<script type="text/javascript">

 
</script> 

@endsection