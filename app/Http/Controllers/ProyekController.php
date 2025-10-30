<?php
namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    public function index()
    {
        $data['dataProyek'] = Proyek::all();
        return view('pages.guest.proyek.index', $data);
    }

    public function create()
    {
        return view('pages.guest.proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_proyek' => 'required',
            'nama_proyek' => 'required',
            'tahun'       => 'required|date',
            'lokasi'      => 'required',
            'anggaran'    => 'required',
            'sumber_dana' => 'nullable',
            'deskripsi'   => 'nullable',
            'media'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([
            'kode_proyek',
            'nama_proyek',
            'tahun',
            'lokasi',
            'anggaran',
            'sumber_dana',
            'deskripsi',
        ]);

        if ($request->hasFile('media')) {
            $path          = $request->file('media')->store('uploads', 'public');
            $data['media'] = $path;
        }

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
        return view('pages.guest.proyek.edit', $data);
    }

    public function update(Request $request, $proyek_id)
    {
        $proyek = Proyek::findOrFail($proyek_id);

        $data = $request->only([
            'kode_proyek', 'nama_proyek', 'tahun', 'lokasi', 'anggaran', 'sumber_dana', 'deskripsi',
        ]);

        if ($request->hasFile('media')) {
            // hapus file lama kalau ada
            if ($proyek->media && Storage::exists('public/' . $proyek->media)) {
                Storage::delete('public/' . $proyek->media);
            }

            // simpan file baru
            $file          = $request->file('media');
            $path          = $file->store('uploads', 'public');
            $data['media'] = $path;
        }

        $proyek->update($data);

        return redirect()->route('proyek.index')->with('update', 'Data Proyek Berhasil Diperbarui!');
    }

    public function destroy(string $id)
    {
        $proyek = Proyek::findOrFail($id);

        $proyek->delete();

        return redirect()->route('proyek.index')->with('delete', 'Data Proyek Berhasil Dihapus!');
    }

}
