<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Citas;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Citas::all()->toArray();
        return array_reverse($citas);
    }

    public function store(Request $request)
    {
        $cita = new Citas([
            'nota' => $request->input('nota'),
            'fecha' => $request->input('fecha')
        ]);
        $cita->save();

        return response()->json('cita created!');
    }

    public function show($id)
    {
        $cita = Citas::find($id);
        return response()->json($cita);
    }

    public function update($id, Request $request)
    {
        $cita = Citas::find($id);
        $cita->update($request->all());

        return response()->json('cita updated!');
    }

    public function destroy($id)
    {
        $cita = Citas::find($id);
        $cita->delete();

        return response()->json('cita deleted!');
    }
}
