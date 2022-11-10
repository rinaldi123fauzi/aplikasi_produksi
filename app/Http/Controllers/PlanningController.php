<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.planning.index', [
            'plannings' => Planning::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.planning.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode' => 'required|max:50|unique:plannings',
            'qty_target' => 'required',
            'waktu_target' => 'required',
        ]);
        Planning::create($validateData);

        return redirect('/planning')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Planning $planning)
    {
        return view('dashboard.planning.edit',[
            'planning' => $planning,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planning $planning)
    {
        $rules = [
            'qty_target' => 'required',
            'waktu_target' => 'required',
        ];

        if ($request->kode != $planning->kode){
            $rules['kode'] = 'required|max:50|unique:employees';
        }

        $validateData = $request->validate($rules);

        Planning::where('id', $planning->id)
            ->update($validateData);

        return redirect('/planning')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planning $planning)
    {
        Planning::destroy($planning->id);

        return redirect('/planning')->with('success', 'Data Berhasil Dihapus');
    }
}
