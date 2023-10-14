<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSubkriteria = DB::table('subkriteria')
            ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
            ->select('subkriteria.*', 'kriteria.name')
            ->orderBy('subkriteria.kriteria_id')
            ->orderBy('nilai')
            ->get();
        return view('dashboard.subkriteria.index', compact('allSubkriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.subkriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($kriteriaId)
    {
        return view('dashboard.subkriteria.edit', ['kriteriaId' => $kriteriaId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subkriteria $subkriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subkriteria $subkriteria)
    {
        //
    }
}
