<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Worker;
use App\Models\Departament;
use App\Models\Attendance;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::orderBy('name', 'asc')->paginate(10);
        return view('app.workers.index', compact('workers'))
            ->with('i', (request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departaments = Departament::All()->sortBy('name');
        return view('app.workers.create', compact('departaments'));
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
            'name' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'email' => 'required|unique:workers,email',
            'phone' => 'required',
            'departament_id' => 'required'
        ])->validate();

        try{
            Worker::create($request->All());
            return redirect('workers')->with('status', 'Trabajador Creado con exito!');
        }
        catch (\Exception $e) {
            return redirect('workers')->with('status', $e->getMessage());
       }
    }

    /**
     * Show the form the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $worker = Worker::findOrFail($id);
        //solo para ordenar por fecha traigo los attendances a parte
        $attendances = Attendance::orderBy('date', 'asc')->where('worker_id', $id)->paginate(7);
        return view('app.workers.show', compact('worker', 'attendances'))
                ->with('i', (request()->input('page',1)-1)*7);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departaments = Departament::All()->sortBy('name');
        $worker = Worker::findOrFail($id);
        return view('app.workers.edit', compact('worker', 'departaments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker){
        try{
            Validator::make($request->all(), [
                'name' => 'required|min:3|max:50',
                'lastname' => 'required|min:3|max:50',
                'email' => 'required|unique:workers,email,'.$worker->id,
                'phone' => 'required',
                'departament_id' => 'required'
            ])->validate();

            $worker->update($request->All());
            return redirect('workers')->with('status', 'Trabajador actualizado con exito!');
        }
        catch (\Exception $e) {
            return redirect('workers')->with('error', $e->getMessage());
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        try{
            $worker->delete();
            return redirect('workers')->with('status', 'Trabajador borrado con exito!');
        }
        catch (\Exception $e) {
            return redirect('workers')->with('error', $e->getMessage());
        }
    }

    public function search(Request $search){
        return Worker::search($search->id);
    }

}
