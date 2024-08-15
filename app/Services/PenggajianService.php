<?php

namespace App\Services;

use App\Models\Absensi;
use App\Models\Penggajian;

class PenggajianService
{
    public function hitungPenggajian($pegawaiId, $periode)
    {
        // Implementasi perhitungan gaji
        $absensi = Absensi::where('pegawai_id', $pegawaiId)
                            ->where('tanggal', 'LIKE', $periode . '%')
                            ->get();

        // Nilai default untuk perhitungan gaji
        $gajiTotal = 0;
        $potonganTotal = 0;
        $lembur = 0;

        foreach ($absensi as $kehadiran) {
            $gajiHarian = 100000; // Asumsi gaji harian
            $gajiTotal += $gajiHarian;

            // Contoh potongan
            $potongan = 5000; // Asumsi potongan tertentu
            $potonganTotal += $potongan;

            // Contoh perhitungan lembur
            if ($kehadiran->jam_keluar > '17:00:00') {
                $jamLembur = strtotime($kehadiran->jam_keluar) - strtotime('17:00:00');
                $jamLembur = $jamLembur / 3600; // Konversi detik ke jam
                $tarifLembur = 1.5 * ($gajiHarian / 8); // Asumsi tarif lembur
                $lembur += $jamLembur * $tarifLembur;
            }
        }

        // Hitung gaji bersih
        $gajiBersih = $gajiTotal - $potonganTotal + $lembur;

        // Buat record penggajian
        $penggajian = Penggajian::create([
            'pegawai_id' => $pegawaiId,
            'periode' => $periode,
            'gaji_total' => $gajiTotal,
            'potongan_total' => $potonganTotal,
            'lembur' => $lembur,
            'gaji_bersih' => $gajiBersih,
        ]);

        return $penggajian;
    }
}