<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return Absensi::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,pegawai_id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
        ]);

        return Absensi::create($request->all());
    }

    public function show($id)
    {
        return Absensi::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pegawai_id' => 'sometimes|required|exists:pegawai,pegawai_id',
            'tanggal' => 'sometimes|required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return $absensi;
    }

    public function destroy($id)
    {
        return Absensi::destroy($id);
    }
}