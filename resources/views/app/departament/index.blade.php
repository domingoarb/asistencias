@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col-md-10">
        <h4>Listado de departamentos</h4>
    </div>
    <div class="col-sm-2">
        <a href="{{route('departaments.create')}}" class="btn btn-success btn-sm">Crear departamento +</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover" id="datatable">
    <thead class="bg-success text-center text-white">
        <tr>
            <th>N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Opcion</th>
        </tr>
    </thead>
    @forelse($departaments as $departament)
    <tbody>
        <tr>
            <td class="col-md-1">{{++$i}}</td>
            <td class="col-md-2">{{$departament->name}}</td>
            <td class="col-md-7">{{$departament->description}}</td>
            <td class="col-md-2 text-center">
                <form action="{{route('departaments.destroy', [$departament->id])}}" method="post">
                {{csrf_field()}}  {{ method_field('DELETE') }}
                <a href="{{ route('departaments.show', [$departament]) }}" class="btn btn-success btn-sm active"><i class="fas fa-search"></i></a>
                <a href="{{ route('departaments.edit', [$departament]) }}" class="btn btn-info btn-sm active"><i class="fas fa-edit"></i></a>
                <button type="submit" class="btn btn-primary btn-sm"
                        onclick="return confirm('Desea eliminar registro')">
                    <i class="fas fa-trash-alt"></i>
                </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5"> No hay departamentos registrados.</td>
        </tr>
        @endforelse
    </tbody>
    </table>
    <div class="d-flex justify-content-center">{{ $departaments->links() }}</div>
</div>
@endsection


