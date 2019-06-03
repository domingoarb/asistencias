@extends('layouts.base')
@section('content')
@include('app.comun.return',  ['url'=> 'workers.index'])
<br>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header">{{$worker->getFullNameAttribute()}}</h5>
            <div class="card-body">
                <div class="row">
                    <label>Email:</label>{{$worker->email}}
                </div>
                <div class="row">
                    <label>Telefono:</label>{{$worker->phone}}
                </div>
                <div class="row">
                    <label>Departamento:</label>
                    {{$worker->departament->name}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header">Asistencia</h5>
            <div class="card-body">
                @include('app.attendance.simplelist', ['attendances' => $attendances])
            </div>
        </div>
    </div>
</div>


@endsection
