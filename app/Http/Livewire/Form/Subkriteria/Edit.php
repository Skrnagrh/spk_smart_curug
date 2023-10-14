<?php

namespace App\Http\Livewire\Form\Subkriteria;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;

    public $kriteriaId;
    public $subkriteriaId = null;
    public $isFormActive = false;
    public $rangeForm = null;
    public $nilaiForm = null;

    protected $rules = [
        'subkriteriaId' => ['required', 'numeric'],
        'rangeForm' => ['required', 'string', 'max:255'],
        'nilaiForm' => ['required', 'numeric', 'between:1,5'],
    ];

    public function render()
    {
        $this->authorize('is_staff_or_admin');

        $allSubkriteriaByKriteriaId = DB::table('subkriteria')->where('kriteria_id', '=', $this->kriteriaId)->orderBy('nilai')->get();
        return view('livewire.form.subkriteria.edit', compact('allSubkriteriaByKriteriaId'));
    }

    public function update($id)
    {
        $this->authorize('is_staff_or_admin');
        
        $selectedSubkriteria = DB::table('subkriteria')->where('id', '=', $id)->orderBy('nilai')->get();
        foreach ($selectedSubkriteria as $item) {
            if ($item->id == $id) {
                $this->rangeForm = $item->range;
                $this->nilaiForm = $item->nilai;
            }
        }
        $this->isFormActive = true;
        $this->subkriteriaId = $id;
    }

    public function updateForm()
    {
        $this->authorize('is_staff_or_admin');

        $this->validate();

        $update = DB::table('subkriteria')
            ->where('id', $this->subkriteriaId)
            ->update(
                ['range' => $this->rangeForm],
                ['nilai' => $this->nilaiForm]
            );

        $this->resetForm();

        if ($update) {
            return redirect()
                ->route('subkriteria.index')
                ->with([
                    'success' => 'Subkriteria berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Subkriteria gagal diubah'
                ]);
        }
    }

    public function remove($id)
    {
        $this->authorize('is_staff_or_admin');
        
        DB::table('subkriteria')->where('id', '=', $id)->delete();
    }

    public function removeAll()
    {
        $this->authorize('is_staff_or_admin');
        
        $deleteAll = DB::table('subkriteria')->where('kriteria_id', '=', $this->kriteriaId)->delete();

        if ($deleteAll) {
            return redirect()
                ->route('subkriteria.index')
                ->with([
                    'success' => 'Semua subkriteria berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Semua subkriteria gagal dihapus'
                ]);
        }
    }

    protected function resetForm()
    {
        $this->rangeForm = null;
        $this->nilaiForm = null;
        $this->subkriteriaId = null;
        $this->isFormActive = false;
    }
}
