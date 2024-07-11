<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class HitungSawController extends Controller
{
    public function hasil()
    {
        // Ambil semua data alternatif
        $alternatifs = Alternatif::all();

        // Mendapatkan nilai maksimal untuk masing-masing kriteria
        $maxC1 = Alternatif::max('C1');
        $maxC2 = Alternatif::max('C2');
        $maxC3 = Alternatif::max('C3');
        $maxC4 = Alternatif::max('C4');
        $maxC5 = Alternatif::max('C5');

        // Bobot untuk masing-masing kriteria
        $bobotC1 = 0.25;
        $bobotC2 = 0.2;
        $bobotC3 = 0.25;
        $bobotC4 = 0.15;
        $bobotC5 = 0.15;

        // Normalisasi dan pembobotan
        foreach ($alternatifs as $item) {
            // Normalisasi untuk setiap kriteria
            $item->normalisasiC1 = $item->C1 / $maxC1;
            $item->normalisasiC2 = $item->C2 / $maxC2;
            $item->normalisasiC3 = $item->C3 / $maxC3;
            $item->normalisasiC4 = $item->C4 / $maxC4;
            $item->normalisasiC5 = $item->C5 / $maxC5;

            // Menghitung nilai SAW
            $item->normalized_saw =
                ($item->normalisasiC1 * $bobotC1) +
                ($item->normalisasiC2 * $bobotC2) +
                ($item->normalisasiC3 * $bobotC3) +
                ($item->normalisasiC4 * $bobotC4) +
                ($item->normalisasiC5 * $bobotC5);
        }

        // Tampilkan view hasilHitung dengan data alternatifs
        return view('hasilHitung', [
            'alternatifs' => $alternatifs,
            'title' => 'Hasil Perhitungan SAW',
        ]);
    }
}
