@extends('employee.attendance')
@section('content')
<style>
	#currentTime {
  font-size: 4em;
  text-align: center;
  font-family: 'Oswald';
  font-weight: 100;
  color: #e8f1f0;
  margin: 1px auto;
}
</style>



  <script type="text/javascript">
window.onload = function() {
  clock();  
    function clock() {
    var now = new Date();
    var TwentyFourHour = now.getHours();
    var hour = now.getHours();
    var min = now.getMinutes();
    var sec= now.getSeconds();
    var mid = 'PM';
    if (min < 10) {
      min = "0" + min;
    }
    if (hour > 12) {
      hour = hour - 12;
    }    
    if(hour==0){ 
      hour=12;
    }
    if(TwentyFourHour < 12) {
       mid = 'AM';
    } 
     
  document.getElementById('currentTime').innerHTML = hour+':'+min+':'+sec +' '+ mid ;
  document.getElementById('month').innerHTML = now ;
    setTimeout(clock, 1000);
    }
}

</script>
@endsection