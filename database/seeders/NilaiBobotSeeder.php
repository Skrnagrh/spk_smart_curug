<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiBobot;
use Illuminate\Database\Seeder;

class NilaiBobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allKriteria = Kriteria::all();
        $allAlternatif = Alternatif::all();
        // Urutan Kriteria => JRK | TKT | FSL | LKS | PBL | KTG
        // Urutan Sesuai Excel
        $data = [
            'alternatif1' => [3, 4, 4, 4, 4, 3],
            'alternatif2' => [4, 5, 1, 4, 5, 1],
            'alternatif3' => [3, 4, 2, 3, 5, 4],

            'alternatif4' => [4, 4, 3, 4, 5, 5],
            'alternatif5' => [3, 4, 4, 4, 5, 1],
            'alternatif6' => [3, 4, 4, 4, 4, 4],

            'alternatif7' => [4, 4, 3, 3, 5, 1],
            'alternatif8' => [4, 4, 3, 4, 4, 5],
            'alternatif9' => [3, 3, 4, 4, 5, 1],

            'alternatif10' => [4, 5, 1, 3, 5, 2],
            'alternatif11' => [4, 4, 3, 4, 5, 4],
            'alternatif12' => [3, 4, 3, 3, 3, 5],

            'alternatif13' => [3, 4, 3, 3, 5, 1],
            'alternatif14' => [3, 5, 3, 3, 5, 1],
            'alternatif15' => [3, 4, 3, 3, 5, 1],

            'alternatif16' => [4, 3, 3, 3, 4, 1],
            'alternatif17' => [3, 4, 4, 4, 5, 1],
            'alternatif18' => [4, 3, 2, 3, 4, 3],

            // 'alternatif19' => [2, 3, 3, 3, 5, 1],
            // 'alternatif20' => [5, 1, 3, 1, 3, 2],
            // 'alternatif21' => [5, 3, 3, 1, 3, 1],
            // 'alternatif22' => [1, 1, 1, 1, 4, 2],
            // 'alternatif23' => [5, 3, 4, 1, 5, 1],
            // 'alternatif24' => [1, 2, 4, 1, 2, 1],
            // 'alternatif25' => [1, 1, 2, 2, 5, 2],
            // 'alternatif26' => [3, 1, 1, 1, 5, 1],
            // 'alternatif27' => [1, 1, 1, 1, 5, 3],
            // 'alternatif28' => [5, 3, 5, 1, 4, 2],
            // 'alternatif29' => [1, 1, 1, 1, 5, 2],
            // 'alternatif30' => [5, 2, 4, 4, 5, 1],
            // 'alternatif31' => [3, 2, 4, 5, 4, 4],
            // 'alternatif32' => [1, 1, 1, 1, 1, 3],
            // 'alternatif33' => [4, 2, 1, 3, 4, 1],
            // 'alternatif34' => [3, 1, 4, 5, 2, 4],
            // 'alternatif35' => [3, 2, 3, 5, 2, 3],
            // 'alternatif36' => [3, 2, 2, 5, 5, 1],
            // 'alternatif37' => [1, 1, 1, 1, 5, 1],
            // 'alternatif38' => [2, 3, 5, 1, 5, 1],
            // 'alternatif39' => [5, 3, 5, 5, 1, 5],
            // 'alternatif40' => [5, 5, 5, 5, 1, 1],
            // 'alternatif41' => [1, 2, 4, 2, 2, 3],
            // 'alternatif42' => [5, 2, 3, 1, 2, 1],
            // 'alternatif43' => [1, 1, 1, 1, 5, 4],
            // 'alternatif44' => [1, 1, 1, 1, 5, 3],
            // 'alternatif45' => [3, 3, 4, 1, 5, 1],
            // 'alternatif46' => [5, 1, 1, 1, 5, 1],
            // 'alternatif47' => [4, 2, 4, 4, 3, 3],
            // 'alternatif48' => [3, 1, 1, 1, 1, 4],
            // 'alternatif49' => [4, 4, 5, 4, 3, 1],
            // 'alternatif50' => [5, 2, 2, 2, 2, 1],
            // 'alternatif51' => [1, 1, 2, 1, 5, 1],
            // 'alternatif52' => [2, 1, 1, 1, 5, 2],
            // 'alternatif53' => [5, 4, 5, 1, 5, 1],
            // 'alternatif54' => [1, 1, 2, 1, 5, 4],
            // 'alternatif55' => [5, 3, 3, 2, 2, 1],
            // 'alternatif56' => [1, 1, 2, 1, 3, 1],
            // 'alternatif57' => [1, 2, 4, 3, 4, 1],
            // 'alternatif58' => [1, 2, 3, 1, 5, 2],
            // 'alternatif59' => [3, 1, 3, 2, 2, 3],
            // 'alternatif60' => [4, 2, 3, 1, 2, 3],
            // 'alternatif61' => [5, 5, 5, 5, 1, 1],
            // 'alternatif62' => [1, 1, 1, 1, 5, 5],
            // 'alternatif63' => [5, 1, 2, 1, 4, 2],
            // 'alternatif64' => [1, 1, 1, 1, 5, 4],
            // 'alternatif65' => [2, 1, 1, 1, 5, 1],
            // 'alternatif66' => [2, 2, 2, 1, 5, 1],
            // 'alternatif67' => [5, 3, 5, 1, 4, 1],
            // 'alternatif68' => [5, 5, 5, 1, 5, 1],
            // 'alternatif69' => [2, 2, 3, 5, 5, 1],
            // 'alternatif70' => [2, 1, 2, 1, 2, 3],
            // 'alternatif71' => [1, 1, 1, 1, 5, 2],
            // 'alternatif72' => [2, 1, 2, 4, 5, 2],
            // 'alternatif73' => [2, 1, 1, 1, 5, 3],
            // 'alternatif74' => [4, 4, 5, 2, 2, 1],
            // 'alternatif75' => [2, 1, 1, 1, 1, 2],
            // 'alternatif76' => [4, 2, 4, 1, 2, 2],
            // 'alternatif77' => [2, 2, 5, 2, 2, 3],
            // 'alternatif78' => [5, 2, 3, 5, 2, 2],
            // 'alternatif79' => [5, 2, 5, 3, 4, 2],
            // 'alternatif80' => [2, 1, 2, 2, 5, 2],
            // 'alternatif81' => [2, 2, 2, 2, 3, 1],
            // 'alternatif82' => [4, 4, 5, 2, 3, 1],
            // 'alternatif83' => [4, 2, 3, 5, 2, 1],
            // 'alternatif84' => [4, 5, 5, 2, 5, 2],
            // 'alternatif85' => [2, 1, 2, 1, 2, 1],
            // 'alternatif86' => [1, 1, 1, 1, 5, 5],
            // 'alternatif87' => [2, 2, 4, 1, 2, 2],
            // 'alternatif88' => [2, 2, 3, 1, 2, 1],
            // 'alternatif89' => [1, 1, 1, 1, 5, 2],
        ];

        foreach ($allAlternatif as $keyAlt => $alternatif) {
            foreach ($allKriteria as $keyKrit => $kriteria) {
                NilaiBobot::create([
                    'nilai' => $data['alternatif' . ($keyAlt + 1)][$keyKrit],
                    'kriteria_id' => $kriteria->id,
                    'alternatif_id' => $alternatif->id,
                ]);
            }
        }
    }
}
