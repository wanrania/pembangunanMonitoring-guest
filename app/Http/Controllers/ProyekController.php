<?php
namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $data['dataProyek'] = Proyek::all();
        return view('guest.proyek.index', $data);
    }

    public function create()
    {
        return view('guest.proyek.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'kode_proyek' => 'required',
            'nama_proyek' => 'required',
            'lokasi'      => 'required',
            'anggaran'    => 'required',
        ]);

        $data['kode_proyek'] = $request->kode_proyek;
        $data['nama_proyek'] = $request->nama_proyek;
        $data['tahun']       = $request->tahun;
        $data['lokasi']      = $request->lokasi;
        $data['anggaran']    = $request->anggaran;
        $data['sumber_dana'] = $request->sumber_dana;
        $data['deskripsi']   = $request->deskripsi;
        $data['media']       = $request->media;

        Proyek::create($data);

        return redirect()->route('proyek.index')->with('success', 'Data Proyek Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $data['dataProyek'] = Proyek::findOrFail($id);
        return view('guest.proyek.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $proyek_id = $id;
        $proyek    = Proyek::findOrFail($proyek_id);

        $request->validate([
            'kode_proyek' => 'required',
            'nama_proyek' => 'required',
            'lokasi'      => 'required',
            'anggaran'    => 'required',
        ]);

        $proyek->kode_proyek = $request->kode_proyek;
        $proyek->nama_proyek = $request->nama_proyek;
        $proyek->tahun       = $request->tahun;
        $proyek->lokasi      = $request->lokasi;
        $proyek->anggaran    = $request->anggaran;
        $proyek->sumber_dana = $request->sumber_dana;
        $proyek->deskripsi   = $request->deskripsi;
        $proyek->media       = $request->media;

        $proyek->save();

        return redirect()->route('proyek.index')->with('update', 'Perubahan Data Proyek Berhasil!');
    }

    public function destroy(string $id)
    {
        $proyek = Proyek::findOrFail($id);

        $proyek->delete();

        return redirect()->route('proyek.index')->with('delete', 'Data Proyek Berhasil Dihapus!');
    }

}
