@extends('layouts.app')
@section('content')

<title>Raptas IO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container" style="background: #40b0d7; color:white; font-size: 20px; padding-top:0px;
  padding-bottom:0px;" align="center">
  <h1>Attendance Log</h1> 
  <p>Full attendance log details shows here</p> 
</div>

<div class="w3-row-padding">
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: separate;
    width: 100%;
}

td, th {
    border: 4px solid #6c757d;
    text-align: center;
    font-size: 20px;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: #40b0d7;
}
</style>

<table>
  <tr>
    <th>Employee ID</th>
    <th>Employee Name</th>
    <th>Check IN</th>
    <th>Check OUT</th>
    <th>Status</th>
    
  </tr>
  @foreach ($records as $item)

  <tr>
    <td>{{$item->emp_id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->checkIN}}</td>
    <td>{{$item->checkOUT}}</td>
    <td>{{$item->staus_flag}}</td>
    
  </tr>
 @endforeach
</table>
  <!-- <div class="w3-third">
    <h2>London</h2>
    <p>London is the capital city of England.</p>
    <p>It is the most populous city in the United Kingdom,
    with a metropolitan area of over 13 million inhabitants.</p>
  </div>

  <div class="w3-third">
    <h2>Paris</h2>
    <p>Paris is the capital of France.</p> 
    <p>The Paris area is one of the largest population centers in Europe,
    with more than 12 million inhabitants.</p>
  </div>

  <div class="w3-third">
    <h2>Tokyo</h2>
    <p>Tokyo is the capital of Japan.</p>
    <p>It is the center of the Greater Tokyo Area,
    and the most populous metropolitan area in the world.</p>
  </div> -->
</div>

@endsection 