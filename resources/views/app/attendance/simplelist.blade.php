<div class="table-responsive">
    <table class="table table-bordered table-hover">
    <thead class="bg-success text-center text-white">
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col" >Hora entrada</th>
            <th scope="col">Hora salida</th>
        </tr>
    </thead>

    @forelse($attendances as $attendance)
    <tbody>
        <tr class="text-center">
            <td>{{$attendance->date}}</td>
            <td>{{ \Carbon\Carbon::parse($attendance->check_in)->format('d-m-Y H:i')}}</td>
            <td>{{ \Carbon\Carbon::parse($attendance->check_out)->format('d-m-Y H:i')}}
            </td>
        @empty
        <tr>
            <td colspan="5"> No tiene asistencias.</td>
        </tr>
        @endforelse
    </tbody>
    </table>
    <div class="d-flex justify-content-center">{{ $attendances->links() }}</div>

</div>
