<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProyekController extends Controller
{
    // =============================================
    // Function pembatas khusus STAFF
    // =============================================
    private function blockStaff()
{
    if (Auth::check() && Auth::user()->role === 'Staff') {
        abort(403, 'Staff tidak diperbolehkan mengedit atau menghapus data.');
    }
}



    /* =====================================================
        INDEX
    ===================================================== */
    public function index(Request $request)
    {
        $filterable = ['sumber_dana', 'tahun'];
        $searchable = ['nama_proyek', 'kode_proyek', 'lokasi', 'deskripsi'];

        $data['dataProyek'] = Proyek::with('media')
            ->filter($request, $filterable)
            ->search($request, $searchable)
            ->paginate(9)
            ->withQueryString();

        return view('pages.guest.proyek.index', $data);
    }

    /* =====================================================
        CREATE
    ===================================================== */
    public function create()
    {
        return view('pages.guest.proyek.create');
    }

    /* =====================================================
        STORE
    ===================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'kode_proyek' => 'required|unique:proyek,kode_proyek',
            'nama_proyek' => 'required',
            'tahun'       => 'required',
            'media.*'     => 'nullable|file|max:5120'
        ]);

        $proyek = Proyek::create([
            'kode_proyek' => $request->kode_proyek,
            'nama_proyek' => $request->nama_proyek,
            'tahun'       => $request->tahun,
            'lokasi'      => $request->lokasi,
            'anggaran'    => $request->anggaran,
            'sumber_dana' => $request->sumber_dana,
            'deskripsi'   => $request->deskripsi,
        ]);

        /* ==== MEDIA ==== */
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {

                $path = $file->store('media_proyek', 'public');

                Media::create([
                    'ref_table' => 'proyek',
                    'ref_id'    => $proyek->proyek_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order'=> $i,
                ]);
            }
        }

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan');
    }

    /* =====================================================
        SHOW
    ===================================================== */
    public function show($id)
    {
        $proyek = Proyek::with('media')->findOrFail($id);
        return view('pages.guest.proyek.show', compact('proyek'));
    }

    /* =====================================================
        EDIT
    ===================================================== */
    public function edit($id)
    {
        $this->blockStaff(); // STAFF DIBLOK

        $proyek = Proyek::with('media')->findOrFail($id);
        return view('pages.guest.proyek.edit', compact('proyek'));
    }

    /* =====================================================
        UPDATE
    ===================================================== */
    public function update(Request $request, $id)
    {
        $this->blockStaff(); // STAFF DIBLOK

        $proyek = Proyek::findOrFail($id);

        $request->validate([
            'kode_proyek' => 'required|unique:proyek,kode_proyek,' . $id . ',proyek_id',
            'nama_proyek' => 'required',
            'media.*'     => 'nullable|file|max:5120'
        ]);

        $proyek->update([
            'kode_proyek' => $request->kode_proyek,
            'nama_proyek' => $request->nama_proyek,
            'tahun'       => $request->tahun,
            'lokasi'      => $request->lokasi,
            'anggaran'    => $request->anggaran,
            'sumber_dana' => $request->sumber_dana,
            'deskripsi'   => $request->deskripsi,
        ]);

        /* ==== MEDIA TAMBAHAN ==== */
        if ($request->hasFile('media')) {

            $lastSort = Media::where('ref_table', 'proyek')
                ->where('ref_id', $proyek->proyek_id)
                ->max('sort_order') ?? 0;

            foreach ($request->file('media') as $i => $file) {

                $path = $file->store('media_proyek', 'public');

                Media::create([
                    'ref_table' => 'proyek',
                    'ref_id'    => $proyek->proyek_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order'=> $lastSort + $i + 1,
                ]);
            }
        }

        return back()->with('success', 'Proyek berhasil diperbarui');
    }

    /* =====================================================
        DELETE PROYEK
    ===================================================== */
    public function destroy($id)
    {
        $this->blockStaff(); // STAFF DIBLOK

        $proyek = Proyek::with('media')->findOrFail($id);

        foreach ($proyek->media as $media) {
            Storage::disk('public')->delete($media->file_name);
            $media->delete();
        }

        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus');
    }

    /* =====================================================
        DELETE MEDIA SATUAN
    ===================================================== */
    public function destroyMedia($id)
    {
        $this->blockStaff(); // STAFF DIBLOK

        $media = Media::findOrFail($id);

        Storage::disk('public')->delete($media->file_name);
        $media->delete();

        return back()->with('success', 'Media berhasil dihapus');
    }
}
