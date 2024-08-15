<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        return Penggajian::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,pegawai_id',
            'periode' => 'required|string|max:20',
            'gaji_total' => 'nullable|numeric|min:0',
            'potongan_total' => 'nullable|numeric|min:0',
            'lembur' => 'nullable|numeric|min:0',
            'gaji_bersih' => 'nullable|numeric|min:0',
        ]);

        return Penggajian::create($request->all());
    }

    public function show($id)
    {
        return Penggajian::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pegawai_id' => 'sometimes|required|exists:pegawai,pegawai_id',
            'periode' => 'sometimes|required|string|max:20',
            'gaji_total' => 'nullable|numeric|min:0',
            'potongan_total' => 'nullable|numeric|min:0',
            'lembur' => 'nullable|numeric|min:0',
            'gaji_bersih' => 'nullable|numeric|min:0',
        ]);

        $penggajian = Penggajian::findOrFail($id);
        $penggajian->update($request->all());

        return $penggajian;
    }

    public function destroy($id)
    {
        return Penggajian::destroy($id);
    }
}
