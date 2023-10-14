<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NilaiUtilityController extends Controller
{
    public function index()
    {
        $allKriteria = Kriteria::all();
        $allDataProcessed = $this->process_index_data();
        $checkHasEmptyData = $this->check_nilai_bobot_has_empty_data();

        // ambil nilai bobot sesaui alternatif_id
        $nilaiBobotGroupByAlternatifId = [];
        $matrixTernormalisasi = [];
        $cariMinMax = [];
        if (!$checkHasEmptyData) {
            $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
                ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
                ->select('nilai_bobot.alternatif_id', 'alternatif.code', 'alternatif.code_curug')
                ->orderBy('nilai_bobot.alternatif_id')
                ->groupBy('nilai_bobot.alternatif_id')
                ->get();
            $matrixTernormalisasi = $this->matrix_ternormalisasi($nilaiBobotGroupByAlternatifId);

            // buat nilai max dan min setiap kriteria
            foreach ($allKriteria as $kriteria) {
                $cariMinMax[$kriteria->id]['nilaiMin'] = DB::table('nilai_bobot')
                    ->where('kriteria_id', $kriteria->id)
                    ->min('nilai');

                $cariMinMax[$kriteria->id]['nilaiMax'] = DB::table('nilai_bobot')
                    ->where('kriteria_id', $kriteria->id)
                    ->max('nilai');
            }
        }
        return view('dashboard.nilai_bobot.utiliti', compact('allDataProcessed', 'allKriteria', 'nilaiBobotGroupByAlternatifId', 'matrixTernormalisasi', 'cariMinMax', 'checkHasEmptyData'));
    }

    protected function process_index_data()
    {
        $EMPTY_VALUE = 'Empty';
        $result = [];
        $allKriteria = Kriteria::all();
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('alternatif_id', 'code', 'code_curug', 'name_curug')
            ->orderBy('alternatif.code')
            ->groupBy('alternatif.id')
            ->get();

        // Array For Compare to Data Nilai Bobot
        $arrayKriteriaIdFromKriteria = [];
        foreach ($allKriteria as $item) {
            $arrayKriteriaIdFromKriteria[] = $item->id;
        }

        foreach ($nilaiBobotGroupByAlternatifId as $item) {
            $dataKriteria = [];

            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', '=', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            // Array for Compare to Data Kriteria ID
            $arrayKriteriaIdFromSelectedNilaiBobot = [];
            foreach ($selectedNilaiBobot as $itemKriteria) {
                $arrayKriteriaIdFromSelectedNilaiBobot[] = $itemKriteria->kriteria_id;
                $dataKriteria[] = ['kriteria_id' => $itemKriteria->kriteria_id, 'nilaiBobot' => $itemKriteria->nilai];
            }

            // Comparing Data Kriteria ID & Nilai Bobot
            $emptyKriteriaId = array_diff($arrayKriteriaIdFromKriteria, $arrayKriteriaIdFromSelectedNilaiBobot);
            foreach ($emptyKriteriaId as $kriteriaId) {
                $dataKriteria[] = ['kriteria_id' => $kriteriaId, 'nilaiBobot' => $EMPTY_VALUE];
            }

            // Sorting Multidimensional Array By Kriteria ID
            $selectedSorting = array_column($dataKriteria, 'kriteria_id');
            array_multisort($selectedSorting, SORT_ASC, $dataKriteria);

            $item->dataKriteria = $dataKriteria;
            $result[] = $item;
        }

        return $result;
    }

    protected function check_nilai_bobot_has_empty_data()
    {
        $condition = false;
        $EMPTY_VALUE = 'Empty';
        $allKriteria = Kriteria::all();
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('alternatif_id', 'code', 'code_curug', 'name_curug')
            ->orderBy('alternatif.code')
            ->groupBy('alternatif.id')
            ->get();

        // Array For Compare to Data Nilai Bobot
        $arrayKriteriaIdFromKriteria = [];
        foreach ($allKriteria as $item) {
            $arrayKriteriaIdFromKriteria[] = $item->id;
        }

        foreach ($nilaiBobotGroupByAlternatifId as $item) {
            $dataKriteria = [];

            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', '=', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            // Array for Compare to Data Kriteria ID
            $arrayKriteriaIdFromSelectedNilaiBobot = [];
            foreach ($selectedNilaiBobot as $itemKriteria) {
                $arrayKriteriaIdFromSelectedNilaiBobot[] = $itemKriteria->kriteria_id;
                $dataKriteria[] = ['kriteria_id' => $itemKriteria->kriteria_id, 'nilai' => $itemKriteria->nilai];
            }

            // Comparing Data Kriteria ID & Nilai Bobot
            $emptyKriteriaId = array_diff($arrayKriteriaIdFromKriteria, $arrayKriteriaIdFromSelectedNilaiBobot);
            foreach ($emptyKriteriaId as $kriteriaId) {
                $dataKriteria[] = ['kriteria_id' => $kriteriaId, 'nilai' => $EMPTY_VALUE];
                $condition = true;
                break;
            }
        }

        return $condition;
    }

    protected function min_max($arraySelectedNilaiBobot = [])
    {
        $nilaiBobotGroupByKriteriaId = DB::table('nilai_bobot')
            ->join('kriteria', 'nilai_bobot.kriteria_id', '=', 'kriteria.id')
            ->select('kriteria_id', 'kriteria.name', 'kriteria.type', DB::raw('MAX(nilai) AS max_nilai_kriteria'), DB::raw('MIN(nilai) AS min_nilai_kriteria'))
            ->orderBy('kriteria_id')
            ->groupBy('kriteria_id')
            ->get();

        $result = [];

        for ($i = 0; $i < count($nilaiBobotGroupByKriteriaId); $i++) {
            if ($nilaiBobotGroupByKriteriaId[$i]->type == 'benefit') {
                $max_nilai_kriteria = $nilaiBobotGroupByKriteriaId[$i]->max_nilai_kriteria;
                $min_nilai_kriteria = $nilaiBobotGroupByKriteriaId[$i]->min_nilai_kriteria;
                $nilai = $arraySelectedNilaiBobot[$i]->nilai;

                if ($max_nilai_kriteria == $min_nilai_kriteria) {
                    $hasil = ($nilai - $min_nilai_kriteria);
                } else {
                    $hasil = ($nilai - $min_nilai_kriteria) / ($max_nilai_kriteria - $min_nilai_kriteria);
                }

                $result[] = ['krit_code' => $nilaiBobotGroupByKriteriaId[$i]->name, 'hasil_utiliti' => $hasil];
            }
            if ($nilaiBobotGroupByKriteriaId[$i]->type == 'cost') {
                $max_nilai_kriteria = $nilaiBobotGroupByKriteriaId[$i]->max_nilai_kriteria;
                $min_nilai_kriteria = $nilaiBobotGroupByKriteriaId[$i]->min_nilai_kriteria;
                $nilai = $arraySelectedNilaiBobot[$i]->nilai;

                if ($max_nilai_kriteria == $min_nilai_kriteria) {
                    $hasil = ($max_nilai_kriteria - $min_nilai_kriteria);
                } else {
                    $hasil = ($max_nilai_kriteria - $nilai) / ($max_nilai_kriteria - $min_nilai_kriteria);
                }

                $result[] = ['krit_code' => $nilaiBobotGroupByKriteriaId[$i]->name, 'hasil_utiliti' => $hasil];
            }
        }

        return $result;
    }

    protected function matrix_ternormalisasi($arrayNilaiBobotByAlternatifId = [])
    {
        $result = [];

        foreach ($arrayNilaiBobotByAlternatifId as $item) {
            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', '=', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            $result[] = $this->min_max($selectedNilaiBobot);
        }

        return $result;
    }
}
