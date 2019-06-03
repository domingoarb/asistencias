@extends('layouts.base')
@section('content')
@include('app.comun.return',  ['url'=> 'departaments.index'])
<div class="card">
  <h5 class="card-header">Registro de trabajador</h5>
  <div class="card-body">
    <form action="{{route('departaments.update', [$departament->id])}}" method="post" class="needs-validation" novalidate>
    {{ method_field('PUT') }}
    {{csrf_field()}}

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">Nombre</label>
            <input name="name" type="text" class="form-control" value="{{$departament->name}}"
                    id="validationCustom01" placeholder="Nombre" required>
            <div class="valid-feedback">Valido!</div>
            <div class="invalid-feedback">Favor escriba el nombre</div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationCustom02">Descripcion</label>
            <input name="description" type="text" class="form-control" value="{{$departament->description}}"
                    id="validationCustom02" placeholder="Descripcion" required>
            <div class="valid-feedback">Valido!</div>
            <div class="invalid-feedback">Favor escriba una descripcion</div>
        </div>

    </div>

    <div class="text-center">
        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a href="{{route('departaments.index')}}" class="btn btn-success">Retornar</a>
    </div>
    </form>
    </div>
</div>

@include('app.comun.validador')
@endsection
