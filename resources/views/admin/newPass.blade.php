@extends('layouts.app')

@section('content')
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

  <h2>Your Password have Been Expired Please Create New Password</h2>
  <form method="POST" action="{{URL('ad/ps')}}">
    @csrf
   
  <div class="form-group">
  	 @foreach($getid as $ids)

	<input type="text"  id="id"  name="id" value="{{$ids}}" style="display: none">
	@endforeach

    </div>
    
    <div class="form-group">
      <label for="current_password">Current Password:</label>
      <input type="password" class="form-control" id="current_password" placeholder="Enter password" name="current_password">
    </div>
    <div class="form-group">
      <label for="new_password">New Password:</label>
      <input type="password" class="form-control" id="new_password" placeholder="new_password" name="new_password">
    </div>
    <div class="form-group">
      <label for="re_password">Re-Enter Password:</label>
      <input type="password" class="form-control" id="re_password" placeholder="re_password" name="re_password">
    </div>
    
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
</div>

</body>
</html>
@endsection