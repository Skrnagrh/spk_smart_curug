<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\View\Components\Alert;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAlternatif = Alternatif::all();
        return view('dashboard.alternatif.index', compact('allAlternatif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = Alternatif::kode();
        return view('dashboard.alternatif.create', compact('kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lastValueCode = DB::table('alternatif')->orderBy('code', 'desc')->first();
        $code = is_null($lastValueCode) ? 1 : $lastValueCode->code + 1;

        $request->validate([
            'image' => 'image|max:1024',
            'nohp' => 'max:13',
        ]);

        $alternatif = Alternatif::create([
            'code' => $code,
            'code_curug' => $request->code_curug,
            'name_curug' => $request->name_curug,
            'description' => $request->description,
            'waktu_awal' => $request->waktu_awal,
            'waktu_akhir' => $request->waktu_akhir,
            'nohp' => $request->nohp,
        ]);

        // buat menyimpan file gambar
        if ($request->file('image')) {
            $alternatif['image'] = $request->file('image')->store('alternatif-images');
            $alternatif->save();
        }

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'Alternatif berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Alternatif gagal dibuat'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['alternatif'] = Alternatif::findOrFail($id);
        return view('dashboard.alternatif.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('dashboard.alternatif.edit', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        $request->validate([
            'image' => 'image|max:1024',
        ]);

        $alternatif->update([
            'code_curug' => $request->code_curug,
            'name_curug' => $request->name_curug,
            'description' => $request->description,
            'waktu_awal' => $request->waktu_awal,
            'waktu_akhir' => $request->waktu_akhir,
            'nohp' => $request->nohp,
            // 'image' => $alternatif['image'],
        ]);

        // ini buat update gambar
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $alternatif['image'] = $request->file('image')->store('alternatif-images');
            $alternatif->save();
        }

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'Alternatif berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Alternatif gagal diubah'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'Alternatif berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'error' => 'Alternatif gagal dihapus'
                ]);
        }
    }
}
