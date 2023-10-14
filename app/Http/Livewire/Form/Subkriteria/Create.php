<?php

namespace App\Http\Livewire\Form\Subkriteria;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;

    public $selectedKriteria = null;
    public $allSubkriteriaByKriteriaId = null;
    public $formCounter = [];
    public $formData = [];

    protected $rules = [
        'selectedKriteria' => ['required', 'numeric'],
        'formData.*.range' => ['required', 'string', 'max:255'],
        'formData.*.nilai' => ['required', 'numeric', 'between:1,5'],
    ];

    public function render()
    {
        $this->authorize('is_staff_or_admin');

        $allKriteria = DB::table('kriteria')->select('id', 'name', 'code', 'description')->get();

        return view('livewire.form.subkriteria.create', compact('allKriteria'));
    }

    public function updatedSelectedKriteria($kriteria_id)
    {
        $this->authorize('is_staff_or_admin');

        if (!empty($kriteria_id)) {
            // Hanya untuk pembuktian Ada Data
            $this->allSubkriteriaByKriteriaId = DB::table('subkriteria')->where('kriteria_id', '=', $kriteria_id)->get();
            $this->formCounter = [0];
        } else {
            $this->allSubkriteriaByKriteriaId = null;
        }
    }

    public function add()
    {
        $this->authorize('is_staff_or_admin');

        $countFormCounter = count($this->formCounter);

        // Push Array
        $this->formCounter[] = $countFormCounter;
    }

    public function remove()
    {
        $this->authorize('is_staff_or_admin');

        array_pop($this->formCounter);
    }

    public function submit()
    {
        $this->authorize('is_staff_or_admin');

        $this->validate();

        $this->store($this->formData);
    }

    protected function store($data)
    {
        $this->authorize('is_staff_or_admin');

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['kriteria_id'] = $this->selectedKriteria;
        }

        try {
            $store = DB::table('subkriteria')->insert($data);

            if ($store) {
                return redirect()
                    ->route('subkriteria.index')
                    ->with([
                        'success' => 'Subkriteria berhasil dibuat'
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Subkriteria gagal dibuat'
                    ]);
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorCode = $exception->errorInfo[1];

            // Check if the error is due to duplicate entry
            if ($errorCode === 1062) {
                return redirect()
                    ->route('subkriteria.index')
                    ->with([
                        'error' => 'Data gagal ditambahkan. Subkriteria dengan nilai yang sama sudah ada.'
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Subkriteria gagal dibuat'
                    ]);
            }
        }
    }
}
