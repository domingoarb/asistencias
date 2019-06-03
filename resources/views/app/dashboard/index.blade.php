@extends('layouts.base')
@section('content')
  <!-- Calendar-->
<link href="{{asset('/vendor/calendar/core/main.min.css')}}" rel="stylesheet">
<link href="{{asset('/vendor/calendar/daygrid/main.min.css')}}" rel="stylesheet">

<script src="{{asset('/vendor/calendar/core/main.min.js')}}"></script>
<script src="{{asset('/vendor/calendar/interaction/main.min.js')}}"></script>
<script src="{{asset('/vendor/calendar/daygrid/main.min.js')}}"></script>
<script src="{{asset('/vendor/calendar/core/locales/es.js')}}"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    datos = @json($attendanceList).map(item =>({
        title: item.title+" Trabajadores",
        start: item.start,
        url : "/attendances/"+item.start
    }));
    fecha = @json($date);

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'interaction', 'dayGrid' ],
    defaultDate: fecha,
    locale: 'es',
    events: datos
  });

  calendar.render();
});

</script>
<style>


#calendar {
  max-width: 800px;
  margin: 0 auto;
}

</style>
<div id='calendar'></div>
@endsection
