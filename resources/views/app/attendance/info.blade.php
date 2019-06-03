<table class="table table-bordered table-hover">
    <thead class="bg-success text-center text-white">
        <tr>
            <th>N°</th>
            <th scope="col">Departamento</th>
            <th scope="col">Asistentes</th>
        </tr>
    </thead>
    @forelse($attendancesStat as $attendance)
    <tbody>
        <tr>
            <td class="text-center">{{++$i}}</td>
            <td>{{$attendance->name}}</td>
            <td class="text-center">{{$attendance->count}}</td>
        </tr>
    @empty
    <tr>
        <td colspan="3"> No hay asistencias hoy.</td>
    </tr>
    @endforelse
    <tr>
        <td class="text-center" colspan="2">Total:</td>
        <td class="text-center">{{$attendancesStat->sum('count')}}</td>
    </tr>
</table>
