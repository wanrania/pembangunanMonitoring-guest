<?php

namespace App\Http\Controllers;

use App\Models\LokasiProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class LokasiProyekController extends Controller
{
    public function index()
    {
        $data['lokASI'] = LokasiProyek::with('proyek')->get();
        return view('pages.guest.lokasi.index', $data);
    }

    public function create()
    {
        $data['proyek'] = Proyek::all(); // Dropdown untuk memilih proyek
        return view('pages.guest.lokasi.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat'       => 'required',
            'lng'       => 'required',
            'geojason'  => 'nullable',
        ]);

        LokasiProyek::create($request->all());

        return redirect()->route('lokasi.index')->with('success', 'Lokasi proyek berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data['lokasi'] = LokasiProyek::findOrFail($id);
        $data['proyek'] = Proyek::all();
        return view('pages.guest.lokasi.edit', $data);
    }

    public function update(Request $request, $lokasi_id)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat'       => 'required',
            'lng'       => 'required',
            'geojason'  => 'nullable',
        ]);

        $lokasi = LokasiProyek::findOrFail($lokasi_id);
        $lokasi->update($request->all());

        return redirect()->route('lokasi.index')->with('update', 'Lokasi proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $lokasi = LokasiProyek::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('lokasi.index')->with('delete', 'Lokasi proyek berhasil dihapus!');
    }
}
