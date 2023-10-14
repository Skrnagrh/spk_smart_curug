<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Database\Seeder;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['range' => '1 - 20 KM', 'nilai' => 5, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => '21 - 40 KM', 'nilai' => 4, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => '41 - 60 KM', 'nilai' => 3, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => '61 - 80 KM', 'nilai' => 2, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => '> 80  KM', 'nilai' => 1, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => '0 - 10 RB', 'nilai' => 5, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => '11 - 20 RB', 'nilai' => 4, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => '21 - 30 RB', 'nilai' => 3, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => '31 - 40 RB', 'nilai' => 2, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => '> 41 RB', 'nilai' => 1, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => 'Tidak Ada', 'nilai' => 1, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'Saung', 'nilai' => 2, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'Saung dan Toilet', 'nilai' => 3, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'Saung, Toilet dan Mushola', 'nilai' => 4, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'Saung, Toilet, Mushola dan Penginapan', 'nilai' => 5, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => 'Lokasi Sangat Kurang Strategis', 'nilai' => 1, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => 'Lokasi Kurang Strategis', 'nilai' => 2, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => 'Lokasi Cukup Strategis', 'nilai' => 3, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => 'Lokasi Strategis', 'nilai' => 4, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => 'Lokasi Sangat Strategis', 'nilai' => 5, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => '>41 KM', 'nilai' => 1, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => '31-40 KM', 'nilai' => 2, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => '21-30 KM', 'nilai' => 3, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => '11-20 KM', 'nilai' => 4, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => '0-10 KM', 'nilai' => 5, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => '3-10 M', 'nilai' => 1, 'kriteria_id' => Kriteria::find(6)->id],
            ['range' => '11-20 M', 'nilai' => 2, 'kriteria_id' => Kriteria::find(6)->id],
            ['range' => '21-30 M', 'nilai' => 3, 'kriteria_id' => Kriteria::find(6)->id],
            ['range' => '31-40 M', 'nilai' => 4, 'kriteria_id' => Kriteria::find(6)->id],
            ['range' => '>41 M', 'nilai' => 5, 'kriteria_id' => Kriteria::find(6)->id],
        ];

        foreach ($data as $item) {
            Subkriteria::create([
                'range' => $item['range'],
                'nilai' => $item['nilai'],
                'kriteria_id' => $item['kriteria_id']
            ]);
        }
    }
}
