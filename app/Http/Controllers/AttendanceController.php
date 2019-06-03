<?php

namespace App\Http\Controllers;

use Validator;

use App\Models\Attendance;
use App\Models\Departament;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d');
        $attendances = Attendance::whereDate('date', $date)->orderBy('check_in', 'asc')->paginate(20);
        $attendancesStat = Attendance::listByDate($date);

        return view('app.attendance.index', compact('attendances', 'attendancesStat', 'date'))
            ->with('i', (request()->input('page',1)-1)*20);
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.attendance.create');
    }


    public function show($date)
    {
        $attendances = Attendance::whereDate('date', $date)->orderBy('check_in', 'asc')->paginate(20);
        $attendancesStat = Attendance::listByDate($date);

        return view('app.attendance.index', compact('attendances', 'attendancesStat', 'date'))
            ->with('i', (request()->input('page',1)-1)*20);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'workers_id' => 'required',
            'check_in' => 'required',
        ])->validate();

        try{
            DB::beginTransaction();
                $attendance = new Attendance();
                $attendance->saving($request);
            DB::commit();
                return redirect('attendances')->with('status', 'Registro creado con exito!');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect('attendances')->with('status', $e->getMessage());
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function showAttendanceXDepartament($id, $date='Y-m-d')
    {
        $departament = Departament::findOrFail($id);
        $listAttendance = Attendance::listByDepartamentDate($id, $date);
        return view('app.attendance.show', compact('listAttendance', 'date', 'departament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        return view('app.attendance.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        Validator::make($request->all(), [
            'check_in' => 'required',
        ])->validate();

        try{
            $attendance->update($request->All());
            return redirect('attendances')->with('status', 'Registro actualizado con exito!');
        }
        catch (\Exception $e) {
            return redirect('attendances')->with('status', $e->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        try{
            $attendance->delete();
            return redirect('attendances')->with('status', 'Registro borrado con exito!');
        }
        catch (\Exception $e) {
            return redirect('attendances')->with('error', $e->getMessage());
        }
    }
}
