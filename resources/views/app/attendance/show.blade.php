@extends('layouts.base')
@section('content')

<div class="text-center"><h4>Asistencia {{$departament->name}} día {{\Carbon\Carbon::parse($date)->format('d-m-Y')}}</h4></div>

<table class="table table-bordered">
  <thead>
    <tr class="text-center">
        <th scope="col">Nombre</th>
        <th scope="col">Hora entrada</th>
        <th scope="col">Hora salida</th>
    </tr>
  </thead>

  @forelse($listAttendance as $attendance)
  <tbody>
    <tr>
        <td>{{$attendance->name}},{{$attendance->lastname}}</td>
        <td>{{$attendance->check_in}}</td>
        <td>{{$attendance->check_out}}</td>
    </tr>
    @empty
    <tr>
        <td colspan="4"> No hay usuarios registrados.</td>
    </tr>
    @endforelse
  </tbody>
</table>

@endsection
