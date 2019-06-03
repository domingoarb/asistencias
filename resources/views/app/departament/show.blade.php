@extends('layouts.base')
@section('content')
<div class="row">
@include('app.comun.return',  ['url'=> 'departaments.index'])

    <div class="col-md-10">
        <h4>Listado de trabajadores del departamento {{$departament->name}} </h4>
    </div>
</div>
<table class="table table-bordered table-hover">
  <thead class="bg-success text-center text-white">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">phone</th>
        <th scope="col">Email</th>
        <th scope="col">Estatus</th>
    </tr>
  </thead>
@forelse($departament->workers as $worker)
<tbody>
    <tr>
        <td>{{$worker->name}}</td>
        <td>{{$worker->lastname}}</td>
        <td>{{$worker->phone}}</td>
        <td>{{$worker->email}}</td>
        <td class="text-center">
            @if($worker->isActive())
                <i class="fas fa-user-slash fa-lg"></i>
            @else
                <i class="fas fa-user-check fa-lg"></i>
            @endif
        </td>
    </tr>

@empty
    <tr>
        <td colspan="5"> No hay departamentos registrados.</td>
    </tr>
    @endforelse
    </tbody>
</table>
@endsection
