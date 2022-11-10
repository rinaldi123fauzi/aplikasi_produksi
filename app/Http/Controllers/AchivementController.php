<?php

namespace App\Http\Controllers;

use App\Models\Achivement;
use Illuminate\Http\Request;

class AchivementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.achivement.index', [
            'achivements' => Achivement::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.achivement.create');
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
            'kode' => 'required|max:50|unique:achivements',
            'time_from' => 'required',
            'time_to' => 'required',
        ]);
        Achivement::create($validateData);

        return redirect('/achivement')->with('success', 'Data Berhasil Disimpan');
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
    public function edit(Achivement $achivement)
    {
        return view('dashboard.achivement.edit',[
            'achivement' => $achivement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achivement $achivement)
    {
        $rules = [
            'time_from' => 'required',
            'time_to' => 'required',
        ];

        if ($request->kode != $achivement->kode){
            $rules['kode'] = 'required|max:50|unique:achivement';
        }

        $validateData = $request->validate($rules);

        Achivement::where('id', $achivement->id)
            ->update($validateData);

        return redirect('/achivement')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achivement $achivement)
    {
        Achivement::destroy($achivement->id);

        return redirect('/item')->with('success', 'Data Berhasil Dihapus');
    }
}
