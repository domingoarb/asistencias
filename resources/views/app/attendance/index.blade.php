@extends('layouts.base')
@section('content')
<i class=""></i>
<br>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header">Informacion diaria</h5>
            <div class="card-body">
                @include('app.attendance.info')
            </div>
        </div>
    </div>
    <div class="col-md-8 float-right">
        <div class="card">
            <h5 class="card-header">Asistencia diaria fecha {{\Carbon\Carbon::parse($date)->format('d-m-Y')}}</h5>
            <div class="card-body">
                @include('app.attendance.list')
            </div>
        </div>
    </div>
</div>
</div>
@endsection
