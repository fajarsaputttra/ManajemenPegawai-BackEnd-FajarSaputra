<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil diambil',
            'data' => $pegawai
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'nomor_kontak' => 'nullable|string|max:20',
            'jabatan' => 'required|string|max:50',
            'departemen' => 'nullable|string|max:50',
            'tanggal_mulai' => 'nullable|date',
            'gaji_pokok' => 'nullable|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $pegawai = Pegawai::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil ditambahkan',
            'data' => $pegawai
        ], 201);
    }

    public function show($pegawai_id)
    {
        $pegawai = Pegawai::where('pegawai_id', $pegawai_id)->firstOrFail();

        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil diambil',
            'data' => $pegawai
        ], 200);
    }

    public function update(Request $request, $pegawai_id)
    {
        $request->validate([
            'nama' => 'sometimes|required|string|max:100',
            'alamat' => 'nullable|string',
            'nomor_kontak' => 'nullable|string|max:20',
            'jabatan' => 'sometimes|required|string|max:50',
            'departemen' => 'nullable|string|max:50',
            'tanggal_mulai' => 'nullable|date',
            'gaji_pokok' => 'nullable|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $pegawai = Pegawai::where('pegawai_id', $pegawai_id)->firstOrFail();
        $pegawai->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil diperbarui',
            'data' => $pegawai
        ], 200);
    }

    public function destroy($pegawai_id)
    {
        $pegawai = Pegawai::where('pegawai_id', $pegawai_id)->firstOrFail();
        $pegawai->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pegawai berhasil dihapus'
        ], 204);
    }
}