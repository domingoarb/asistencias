<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Departament;
use App\Models\Worker;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departaments = Departament::orderBy('name')->paginate(10);
        return view('app.departament.index', compact('departaments'))
            ->with('i', (request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.departament.create');
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
            'name' => 'required|unique:departaments,name',
            'description' => 'required|min:5|max:80',
        ])->validate();

        try{
            Departament::create($request->All());
            return redirect('departaments')->with('status', 'Departamento Creado con exito!');
        }
        catch (\Exception $e) {
            return redirect('departaments')->with('status', $e->getMessage());
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function show(Departament $departament)
    {
        return view('app.departament.show', compact('departament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function edit(Departament $departament)
    {
        return view('app.departament.edit', compact('departament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departament $departament)
    {
        try{
            Validator::make($request->all(), [
                'name' => 'required|unique:departaments,name,'.$departament->id,
                'description' => 'required|min:5|max:80',
            ])->validate();

            $departament->update($request->All());
            return redirect('departaments')->with('status', 'Departamento actualizado con exito!');
        }
        catch (\Exception $e) {
            return redirect('departaments')->with('error', $e->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departament $departament)
    {
        try{
            $departament->delete();
            return redirect('departaments')->with('status', 'Trabajador borrado con exito!');
        }
        catch (\Exception $e) {
            return redirect('departaments')->with('error', $e->getMessage());
        }
    }
}
