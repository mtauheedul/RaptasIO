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



<div class="container">

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

<script type="text/javascript">

    $('.timepicker').datetimepicker({
}); 



$(document).ready(function(){
    $("#nameSelector").change(function(){
       $("#for").show();
       $("#selectedEmp").show();
        val = $("#nameSelector option:selected").text();
        $("#selectedEmp").text(val);
        //alert(val);
    });
});


</script>  

 @endsection 