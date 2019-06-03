@extends('layouts.base')
@section('content')

@include('app.comun.return',  ['url'=> 'workers.index'])

<div class="card">
  <h5 class="card-header">Registro de trabajador</h5>
  <div class="card-body">
    <form action="{{route('workers.update', [$worker->id])}}" method="post" class="needs-validation" novalidate>
    {{ method_field('PUT') }}
    {{csrf_field()}}

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">Nombre</label>
            <input name="name" type="text" class="form-control" value="{{$worker->name}}"
                    id="validationCustom01" placeholder="Nombre" required>
            <div class="valid-feedback">Valido!</div>
            <div class="invalid-feedback">Favor escriba el nombre</div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationCustom02">Apellido</label>
            <input name="lastname" type="text" class="form-control" value="{{$worker->lastname}}"
                    id="validationCustom02" placeholder="Apellido" required>
            <div class="valid-feedback">Valido!</div>
            <div class="invalid-feedback">Favor escriba el apellido</div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustomUsername">Email</label>
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text" id="inputGroupPrepend">@</span></div>
                <input type="email" name="email" class="form-control" value="{{$worker->email}}"
                        id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">Favor escriba el email</div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="validationCustom04">Telefono</label>
            <input type="text" name="phone" class="form-control" value="{{$worker->phone}}"
                    id="validationCustom04" placeholder="Telefono" required>
            <div class="invalid-feedback">Por favor escriba un telefono de contacto</div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="validationCustom05">Departamento</label>
            @include('app.departament.select')

            <div class="invalid-feedback">Seleccione el departamento</div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </div>
    </form>
    </div>
</div>

@include('app.comun.validador')
@endsection
