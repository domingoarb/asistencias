@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col-md-10">
        <h4>Listado de trabajadores</h4>
    </div>
    <div class="col-sm-2">
        <a href="{{route('workers.create')}}" class="btn btn-success btn-sm">Crear trabajador +</a>
    </div>
</div>
    <div class="row">
        <table class="table table-bordered table-hover display" id="datatable">
        <thead class="bg-success text-center text-white">
            <tr>
                <th>N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">phone</th>
                <th scope="col">Email</th>
                <th scope="col">Departamento</th>
                <th scope="col">Opcion</th>
            </tr>
        </thead>
        @forelse($workers as $worker)
        <tbody>
            <tr>
            <td>{{++$i}}</td>
            <td>{{$worker->getFullNameAttribute()}}</td>
            <td>{{$worker->phone}}</td>
            <td>{{$worker->email}}</td>
            <td>{{$worker->departament->name}}</td>
            <td class="text-center">
                <form action="{{route('workers.destroy', [$worker->id])}}" method="post">
                {{csrf_field()}}{{ method_field('DELETE') }}
                <a href="{{ route('workers.show', [$worker]) }}" class="btn btn-success btn-sm active"><i class="fas fa-search"></i></a>
                <a href="{{ route('workers.edit', [$worker]) }}" class="btn btn-info btn-sm active"><i class="fas fa-edit"></i></a>
                <button class="btn btn-danger btn-sm active"
                        onclick="return confirm('Desea eliminar registro')"
                        type="submit"><i class="fas fa-trash-alt"></i>
                </button>
                </form>
            </td>
            </tr>
            @empty
            <tr>
                <td colspan="7"> No hay usuarios registrados.</td>
            </tr>
            @endforelse
        </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">{{ $workers->links() }}</div>
@endsection


