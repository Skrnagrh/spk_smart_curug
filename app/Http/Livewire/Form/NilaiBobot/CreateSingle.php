<?php

namespace App\Http\Livewire\Form\NilaiBobot;

use Livewire\Component;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class CreateSingle extends Component
{
    public $selectedAlternatif = null;
    public $selectedKriteria = null;
    public $selectedSubkriteria = null;
    public $allSubkriteriaByKriteriaId = [];

    protected $rules = [
        'selectedAlternatif' => ['required', 'numeric'],
        'selectedKriteria' => ['required', 'numeric'],
        'selectedSubkriteria' => ['required', 'numeric', 'between:1,5'],
    ];

    public function render()
    {
        // $allDataProcessed = $this->process_index_data();
        $allAlternatif = DB::table('alternatif')->select('id', 'code_curug', 'name_curug')->get();
        $allKriteria = DB::table('kriteria')->select('id', 'name', 'code')->get();

        return view('livewire.form.nilai-bobot.create-single', compact('allAlternatif', 'allKriteria'));
        // return view('livewire.form.nilai-bobot.create-single', compact('allAlternatif', 'allKriteria', 'allDataProcessed'));
    }

    public function updatedSelectedKriteria($kriteria_id)
    {
        if (!empty($kriteria_id)) {
            $this->allSubkriteriaByKriteriaId = DB::table('subkriteria')->where('kriteria_id', '=', $kriteria_id)->get();
            // Convert to Array for Avoid Bug Non-Object
            $this->allSubkriteriaByKriteriaId->transform(function ($i) {
                return (array) $i;
            });
            $this->allSubkriteriaByKriteriaId->toArray();
        } else {
            $this->allSubkriteriaByKriteriaId = [];
        }
    }

    public function submit()
    {
        $this->validate();

        $data = [
            'kriteria' => $this->selectedKriteria,
            'subkriteria' => $this->selectedSubkriteria,
            'alternatif' => $this->selectedAlternatif
        ];

        $this->store($data);
    }

    protected function store($data)
    {
        try {
            $store = DB::table('nilai_bobot')->insert([
                'nilai' => $data['subkriteria'],
                'kriteria_id' => $data['kriteria'],
                'alternatif_id' => $data['alternatif'],
            ]);

            if ($store) {
                return redirect()
                    ->route('nilai-bobot.index')
                    ->with([
                        'success' => 'Nilai Bobot berhasil dibuat'
                    ]);
            } else {
                return redirect()
                    ->route('nilai-bobot.index')
                    ->with([
                        'error' => 'Nilai Bobot gagal dibuat'
                    ]);
            }
        } catch (QueryException $e) {
            return redirect()
                ->route('nilai-bobot.index')
                ->with([
                    'error' => 'Data dengan kriteria yang sama sudah ada. Mohon masukkan data yang berbeda!'
                    // 'error' => 'Terjadi kesalahan: ' . $e->getMessage()
                ]);
        }
    }
}
