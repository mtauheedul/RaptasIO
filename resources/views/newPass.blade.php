<!-- @extends('layouts.app')

@section('content') -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Password Expiery Window</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Create New Password</h2>
  <form >
    @csrf
    <div class="form-group">
      <input type="text" class="form-control" id="stored_email"  name="stored_email" style="display: none;" value={{ Auth::admin()->email }}>
    </div>
    
    <div class="form-group">
      <label for="pwd">Current Password:</label>
      <input type="current_password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
      <label for="pwd">New Password:</label>
      <input type="password" class="form-control" id="new_password" placeholder="new_password" name="pwd">
    </div>
    <div class="form-group">
      <label for="pwd">Re-Enter Password:</label>
      <input type="password" class="form-control" id="re_password" placeholder="re_password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
</div>
<!-- <form method="GET" action="{{ URL::to('store/emp')}}">
    {!! csrf_field() !!}
   
    <div class="form-group">
      <label for="name">Email:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name">
    </div> -->
</body>
</html>
<!-- @endsection -->