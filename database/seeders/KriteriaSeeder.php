<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'jrk', 'description' => 'jarak', 'type' => 'benefit', 'bobot' => 6],
            ['name' => 'tkt', 'description' => 'tiket', 'type' => 'cost', 'bobot' => 9],
            ['name' => 'fsl', 'description' => 'fasilitas', 'type' => 'benefit', 'bobot' => 3],
            ['name' => 'lks', 'description' => 'lokasi', 'type' => 'benefit', 'bobot' => 3],
            ['name' => 'pbl', 'description' => 'pusat perbelanjaan', 'type' => 'benefit', 'bobot' => 3],
            ['name' => 'ktg', 'description' => 'ketinggian', 'type' => 'benefit', 'bobot' => 4],
        ];

        foreach ($data as $key => $item) {
            Kriteria::create([
                'code' => $key + 1,
                'name' => $item['name'],
                'description' => $item['description'],
                'type' => $item['type'],
                'bobot' => $item['bobot'],
            ]);
        }
    }
}
