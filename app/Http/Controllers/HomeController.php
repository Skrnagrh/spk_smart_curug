<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function rangking_home()
    {
        $checkHasEmptyData = $this->check_nilai_bobot_has_empty_data();
        $hasilPerankingan = [];
        if (!$checkHasEmptyData) {
            $hasilPerankingan = $this->sorting();
        }
        return view('rangking-home', compact(['hasilPerankingan', 'checkHasEmptyData']));
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

    protected function sorting()
    {
        $result = $this->ranking();
        $selectedSorting = array_column($result, 'hasil_rank');
        array_multisort($selectedSorting, SORT_DESC, $result); //mengurutkan data dari yang terbesar
        // array_multisort($selectedSorting, SORT_ASC, $result); // ini untuk mengurutan data dari nilai yang terkecil

        return $result;
    }

    protected function ranking()
    {
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('nilai_bobot.alternatif_id', 'alternatif.code', 'alternatif.code_curug', 'alternatif.name_curug')
            ->orderBy('nilai_bobot.alternatif_id')
            ->groupBy('nilai_bobot.alternatif_id')
            ->get();
        $persentaseBobot = $this->persentase_bobot();
        $matrixTernormalisasi = $this->matrix_ternormalisasi($nilaiBobotGroupByAlternatifId);
        $result = [];

        for ($i = 0; $i < count($nilaiBobotGroupByAlternatifId); $i++) {
            // 0 Karena Penjumlahan
            $rank = 0;

            for ($j = 0; $j < count($persentaseBobot); $j++) {
                $rank += $persentaseBobot[$j]['persentase_bobot'] * $matrixTernormalisasi[$i][$j]['hasil_utiliti'];
            }

            $result[] = ['alternatif_code' => $nilaiBobotGroupByAlternatifId[$i]->code, 'code_curug' => $nilaiBobotGroupByAlternatifId[$i]->code_curug, 'name_curug' => $nilaiBobotGroupByAlternatifId[$i]->name_curug, 'hasil_rank' => $rank];
        }

        return $result;
    }

    protected function persentase_bobot()
    {
        $allBobot = DB::table('kriteria')->get();
        $totalBobot = $allBobot->sum('bobot');
        $result = [];

        foreach ($allBobot as $item) {
            // Kali 10 agar total menjadi bobot = 10
            // $resultBobot = $item->bobot / $totalBobot * 100;
            $resultBobot = $item->bobot / $totalBobot;
            $result[] = ['id' => $item->id, 'name' => $item->name, 'description' => $item->description, 'type' => $item->type, 'bobot' => $item->bobot, 'persentase_bobot' => $resultBobot];
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

    protected function min_max($arraySelectedNilaiBobot = [])
    {
        $nilaiBobotGroupByKriteriaId = DB::table('nilai_bobot')
            ->join('kriteria', 'nilai_bobot.kriteria_id', '=', 'kriteria.id')
            ->select('kriteria_id', 'kriteria.name', 'kriteria.type', DB::raw('MAX(nilai) AS max_nilai_kriteria'), DB::raw('MIN(nilai) AS min_nilai_kriteria'))
            ->orderBy('kriteria_id')
            ->groupBy('kriteria_id')
            ->get();

        $result = [];

        // Untuk Perthitungan Benefit dan cost
        for ($i = 0; $i < count($nilaiBobotGroupByKriteriaId); $i++) {
            if (isset($arraySelectedNilaiBobot[$i]) && isset($arraySelectedNilaiBobot[$i]->nilai)) {
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
            } else {
                return view('layouts.partial.empty-result'); // Tampilkan tampilan khusus jika ada nilai bobot yang kosong
            }
        }

        return $result;
    }
}
