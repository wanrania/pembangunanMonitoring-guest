<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $data['dataWarga'] = Warga::orderBy('nama')->get();
        return view('guest.warga.index', $data);
    }

    public function create()
    {
        return view('guest.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'telp' => 'nullable|string',
            'email' => 'nullable|email|unique:warga,email',
        ]);

        Warga::create($request->only([
            'no_ktp','nama','jenis_kelamin','agama','pekerjaan','telp','email'
        ]));

        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data['dataWarga'] = Warga::findOrFail($id);
        return view('guest.warga.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp,'.$warga->warga_id.',warga_id',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'telp' => 'nullable|string',
            'email' => 'nullable|email|unique:warga,email,'.$warga->warga_id.',warga_id',
        ]);

        $warga->update($request->only([
            'no_ktp','nama','jenis_kelamin','agama','pekerjaan','telp','email'
        ]));

        return redirect()->route('warga.index')->with('update', 'Data Warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('delete', 'Data Warga berhasil dihapus!');
    }
}
