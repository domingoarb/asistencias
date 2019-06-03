@extends('layouts.base')
@section('content')
@include('app.comun.return',  ['url'=> 'attendances.index'])
<div class="card">
    <h5 class="card-header">Registro de asistencia</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('attendances.store') }}">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="workers" class="col-sm-3 col-form-label">Nombre:</label>
            <div class="col-sm-9">
            <select class="workers" multiple="multiple" style="width:100%" id="workers" name="workers_id[]"></select>
            </div>
        </div>
        <div class="form-group row">
            <label for="check_in" class="col-sm-3 col-form-label">Entrada</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control" id="check_in" name="check_in">
                    <div class="input-group-append">
                        <span class="input-group-text"><span class="fas fa-clock"></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="check_in" class="col-sm-3 col-form-label">Salida</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control" id="check_out" name="check_out">
                    <div class="input-group-append">
                        <span class="input-group-text"><span class="fas fa-clock"></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" type="submit">Registrar</button>
        </div>
        </form>
    </div> <!-- end card body -->
</div>
@endsection
