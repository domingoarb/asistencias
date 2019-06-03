<table class="table table-bordered table-hover">
  <thead class="bg-success text-center text-white">
    <tr>
        <th>N°</th>
        <th scope="col">Nombre</th>
        <th scope="col">Departamento</th>
        <th scope="col">Entrada</th>
        <th scope="col">Salida</th>
        <th scope="col">Opciones</th>
    </tr>
  </thead>

  @forelse($attendances as $attendance)
  <tbody>
    <tr >
        <td>{{++$i}}</td>
        <td>{{$attendance->workers->getFullNameAttribute()}}</td>
        <td>{{$attendance->workers->departament->name}}</td>

        <td>{{ \Carbon\Carbon::parse($attendance->check_in)->format('H:i')}}</td>
        <td>
            @if (isset($attendance->check_out))
                {{ \Carbon\Carbon::parse($attendance->check_out)->format('H:i')}}
            @endif
        </td>

        <td class="text-center">
                <form action="{{route('attendances.destroy', [$attendance->id])}}" method="post">
                {{csrf_field()}}{{ method_field('DELETE') }}
                <a href="{{ route('attendances.edit', [$attendance]) }}" class="btn btn-info btn-sm active"><i class="fas fa-edit"></i></a>
                <button class="btn btn-danger btn-sm active"
                        onclick="return confirm('Desea eliminar registro')"
                        type="submit"><i class="fas fa-trash-alt"></i>
                </button>
                </form>
        </td>
    @empty
    <tr>
        <td colspan="5"> No hay asistencias hoy.</td>
    </tr>
    @endforelse
  </tbody>
</table>
<div class="d-flex justify-content-center">{{ $attendances->links() }}</div>

