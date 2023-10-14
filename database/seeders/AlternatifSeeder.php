<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['code_curug' => 'Crg1', 'name_curug' => 'Curug Lawang'],
            ['code_curug' => 'Crg2', 'name_curug' => 'Curug Goong'],
            ['code_curug' => 'Crg3', 'name_curug' => 'Curug Cikotak'],
            ['code_curug' => 'Crg4', 'name_curug' => 'Curug Cigumawang'],
            ['code_curug' => 'Crg5', 'name_curug' => 'Curug Leuwi Mangrod'],
            ['code_curug' => 'Crg6', 'name_curug' => 'Curug Betung'],
            ['code_curug' => 'Crg7', 'name_curug' => 'Curug Cihujan'],
            ['code_curug' => 'Crg8', 'name_curug' => 'Curug Sawer'],
            ['code_curug' => 'Crg9', 'name_curug' => 'Curug Leuwi Gumi'],
            ['code_curug' => 'Crg10', 'name_curug' => 'Curug Cikarahkal'],
            ['code_curug' => 'Crg11', 'name_curug' => 'Curug Ciwarijan Pasirwaru'],
            ['code_curug' => 'Crg12', 'name_curug' => 'Curug Kembar'],

            //Curug
            ['code_curug' => 'Crg13', 'name_curug' => 'Curug Leuwi Putih'],
            ['code_curug' => 'Crg14', 'name_curug' => 'Curug Cikala'],
            ['code_curug' => 'Crg15', 'name_curug' => 'Curug Sawer Cikembang'],
            ['code_curug' => 'Crg16', 'name_curug' => 'Curug Leuwi Bumi'],
            ['code_curug' => 'Crg17', 'name_curug' => 'Curug Cross'],
            ['code_curug' => 'Crg18', 'name_curug' => 'Curug Cigentur'],

            // Pantai
            // ['code_curug' => 'Crg19', 'name_curug' => 'Pantai Tanjung Tum Anyer'],
            // ['code_curug' => 'Crg20', 'name_curug' => 'Pantai Patra Sambolo I Anyer'],
            // ['code_curug' => 'Crg21', 'name_curug' => 'Pantai Patra Sambolo II Anyer'],
            // ['code_curug' => 'Crg22', 'name_curug' => 'Pantai Bandulu Anyer'],
            // ['code_curug' => 'Crg23', 'name_curug' => 'Pantai Pal Anyar'],
            // ['code_curug' => 'Crg24', 'name_curug' => 'Pantai Anyar I'],
            // ['code_curug' => 'Crg25', 'name_curug' => 'Pantai Anyar II'],
            // ['code_curug' => 'Crg26', 'name_curug' => 'Pantai 234 Anyer'],
            // ['code_curug' => 'Crg27', 'name_curug' => 'Pantai Pasir Putih 121 Anyer'],
            // ['code_curug' => 'Crg28', 'name_curug' => 'Pantai Mercusuar Anyer'],
            // ['code_curug' => 'Crg29', 'name_curug' => 'Pantai Pasir Putih 234 Anyer'],
            // ['code_curug' => 'Crg31', 'name_curug' => 'Pantai Karang Meong & Pasir Putih Sirih Cinangka'],
            // ['code_curug' => 'Crg32', 'name_curug' => 'Pantai Saung Cibereum II Cinangka'],
            // ['code_curug' => 'Crg30', 'name_curug' => 'Pantai Cibereum I Cinangka'],
            // ['code_curug' => 'Crg33', 'name_curug' => 'Pantai Palem Cibereum Cinangka'],
            // ['code_curug' => 'Crg34', 'name_curug' => 'Pantai Karang Kitri Cinangka'],
            // ['code_curug' => 'Crg35', 'name_curug' => 'Pantai Kelapa Gading Cinangka'],
            // ['code_curug' => 'Crg36', 'name_curug' => 'Pantai Pasir Putih Florida Indah I Cinangka'],
            // ['code_curug' => 'Crg37', 'name_curug' => 'Pantai Pasir Putih Florida Indah II Cinangka'],
            // ['code_curug' => 'Crg38', 'name_curug' => 'Pantai Pasir Putih Ciparay Cinangka'],
            // ['code_curug' => 'Crg39', 'name_curug' => 'Pantai Batu saung Cinangka'],
            // ['code_curug' => 'Crg40', 'name_curug' => 'Pantai Lagundi Cinangka'],
            // ['code_curug' => 'Crg41', 'name_curug' => 'Pantai Legon Prima Cinangka'],
            // ['code_curug' => 'Crg42', 'name_curug' => 'Pantai Babacakan AGT Cinangka'],
            // ['code_curug' => 'Crg43', 'name_curug' => 'Pantai Cawis Cinangka'],
            // ['code_curug' => 'Crg44', 'name_curug' => 'Pantai Cawis I Cinangka'],
            // ['code_curug' => 'Crg45', 'name_curug' => 'Pantai Adem Karang Suraga Cinangka'],
            // ['code_curug' => 'Crg46', 'name_curug' => 'Pantai Tawing Cinangka'],
            // ['code_curug' => 'Crg47', 'name_curug' => 'Pantai Wisata Karang Bolong Cinangka'],
            // ['code_curug' => 'Crg48', 'name_curug' => 'Pantai Setia Cinangka'],
            // ['code_curug' => 'Crg49', 'name_curug' => 'Pantai Karang Combong Cinangka'],
            // ['code_curug' => 'Crg50', 'name_curug' => 'Pantai A.Pahmi Cinangka'],
            // ['code_curug' => 'Crg51', 'name_curug' => 'Pantai Waru Cinangka'],
            // ['code_curug' => 'Crg52', 'name_curug' => 'Pantai Banten Cinangka'],
            // ['code_curug' => 'Crg53', 'name_curug' => 'Pantai Baraya Cinangka'],
            // ['code_curug' => 'Crg54', 'name_curug' => 'Pantai Bulakan Cinangka'],
            // ['code_curug' => 'Crg55', 'name_curug' => 'Pantai Jambu 1 Cinangka'],
            // ['code_curug' => 'Crg56', 'name_curug' => 'Pantai Jambu 2 Cinangka'],
            // ['code_curug' => 'Crg57', 'name_curug' => 'Pantai Jambu Landai Tanpa Karang Cinangka'],
            // ['code_curug' => 'Crg58', 'name_curug' => 'Pantai Karang Jodoh Cinangka'],
            // ['code_curug' => 'Crg59', 'name_curug' => 'Pantai Jambu Pangjukungan Cinangka'],
            // ['code_curug' => 'Crg60', 'name_curug' => 'Pantai Wirton Cinangka'],
            // ['code_curug' => 'Crg61', 'name_curug' => 'Pantai Kelapa Jangkung Bulakan Cinangka'],
            // ['code_curug' => 'Crg62', 'name_curug' => 'Pantai Candaria Cinangka'],
            // ['code_curug' => 'Crg63', 'name_curug' => 'Pantai Mamiri Cinangka'],
            // ['code_curug' => 'Crg64', 'name_curug' => 'Pantai Karang Jogo Cinangka'],
            // ['code_curug' => 'Crg65', 'name_curug' => 'Pantai Karang Mandi Cinangka'],
            // ['code_curug' => 'Crg66', 'name_curug' => 'Pantai Karang Kereta Cinangka'],
        ];

        foreach ($data as $key => $item) {
            Alternatif::create([
                'code' => $key + 1,
                'code_curug' => $item['code_curug'],
                'name_curug' => $item['name_curug'],
                // 'description' => $item['description'],
                // 'waktu_awal' => $item['waktu_awal'],
                // 'waktu_akhir' => $item['waktu_akhir'],
                // 'nohp' => $item['nohp'],
            ]);
        }
    }
}
