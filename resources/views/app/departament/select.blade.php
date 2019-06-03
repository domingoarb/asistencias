<select name="departament_id" id="departament_id" class="form-control"
            id="validationCustom" placeholder="Departamento" required>
@if (empty($worker->departament_id))
        <option value="">Seleccione</option>
        @foreach($departaments as $departament)
            <option value="{{$departament->id}}">{{$departament->name}}</option>
        @endforeach
@else
    @foreach($departaments as $departament)
            <option value="{{$departament->id}}"
                @if ($worker->departament_id == $departament->id) selected @endif
            >
                {{$departament->name}}
            </option>
    @endforeach
@endif
</select>
