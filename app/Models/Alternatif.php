<?php

namespace App\Models;

use App\Models\NilaiBobot;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';

    protected $fillable = ['code', 'code_curug', 'name_curug', 'image', 'description', 'waktu_awal', 'waktu_akhir', 'nohp'];

    public function nilaiBobot()
    {
        return $this->hasMany(NilaiBobot::class);
    }

    public static function kode()
    {
        $kode = DB::table('alternatif')->max('code');
        $addNol = '';
        $kode = str_replace("Crg", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1) {
            $addNol = "0";
        }
        // elseif (strlen($kode) == 2) {
        //     $addNol = "00";
        // }

        $kodeBaru = "Crg" . $addNol . $incrementKode;
        return $kodeBaru;
    }

    public function detailalternatif()
    {
        return $this->hasMany(DetailAlternatif::class, 'alternatif_id');
    }
}
