<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use App\Models\LokasiProyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LokasiProyekController extends Controller
{
    /* =====================================================
        ROLE PROTECTION (Staff tidak boleh edit/delete)
    ===================================================== */
    private function blockStaff()
    {
        if (Auth::check() && Auth::user()->role === 'Staff') {
            abort(403, 'Staff tidak diperbolehkan mengubah atau menghapus lokasi proyek.');
        }
    }

    /* =====================================================
        INDEX
    ===================================================== */
    public function index(Request $request)
    {
        $filterable = ['proyek_id'];
        $searchable = ['lat', 'lng', 'geojson'];

        return view('pages.guest.lokasi.index', [
            'proyek' => Proyek::orderBy('nama_proyek')->get(),

            // DATA LOKASI
            'lokasi' => LokasiProyek::with('proyek')
                ->filter($request, $filterable)
                ->search($request, $searchable)
                ->orderByDesc('lokasi_id')
                ->paginate(12)
                ->withQueryString(),
        ]);
    }

    /* =====================================================
        CREATE
        (Staff boleh create lokasi)
    ===================================================== */
    public function create()
    {
        return view('pages.guest.lokasi.create', [
            'proyek' => Proyek::orderBy('nama_proyek')->get(),
        ]);
    }

    /* =====================================================
        STORE
    ===================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat'       => 'required',
            'lng'       => 'required',
            'geojson'   => 'nullable',
            'media.*'   => 'nullable|image|max:2048',
        ]);

        $lokasi = LokasiProyek::create([
            'proyek_id' => $request->proyek_id,
            'lat'       => $request->lat,
            'lng'       => $request->lng,
            'geojson'   => $request->geojson,
        ]);

        /* ==== MEDIA ==== */
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {

                $path = $file->store('media_lokasi', 'public');

                Media::create([
                    'ref_table'  => 'lokasi_proyek',
                    'ref_id'     => $lokasi->lokasi_id,
                    'file_name'  => $path,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi proyek berhasil ditambahkan!');
    }

    /* =====================================================
        SHOW
    ===================================================== */
    public function show($id)
    {
        return view('pages.guest.lokasi.show', [
            'lokasi' => LokasiProyek::with(['media', 'proyek'])->findOrFail($id),
        ]);
    }

    /* =====================================================
        EDIT (Staff DIBLOK)
    ===================================================== */
    public function edit($id)
    {
        $this->blockStaff();

        return view('pages.guest.lokasi.edit', [
            'lokasi' => LokasiProyek::with(['media', 'proyek'])->findOrFail($id),
            'proyek' => Proyek::orderBy('nama_proyek')->get(),
        ]);
    }

    /* =====================================================
        UPDATE (Staff DIBLOK)
    ===================================================== */
    public function update(Request $request, $id)
    {
        $this->blockStaff();

        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat'       => 'required',
            'lng'       => 'required',
            'geojson'   => 'nullable',
            'media.*'   => 'nullable|image|max:2048',
        ]);

        $lokasi = LokasiProyek::findOrFail($id);

        $lokasi->update([
            'proyek_id' => $request->proyek_id,
            'lat'       => $request->lat,
            'lng'       => $request->lng,
            'geojson'   => $request->geojson,
        ]);

        /* ==== MEDIA BARU ==== */
        if ($request->hasFile('media')) {

            $lastSort = Media::where('ref_table', 'lokasi_proyek')
                ->where('ref_id', $lokasi->lokasi_id)
                ->max('sort_order') ?? 0;

            foreach ($request->file('media') as $i => $file) {

                $path = $file->store('media_lokasi', 'public');

                Media::create([
                    'ref_table'  => 'lokasi_proyek',
                    'ref_id'     => $lokasi->lokasi_id,
                    'file_name'  => $path,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $lastSort + $i + 1,
                ]);
            }
        }

        return redirect()->route('lokasi.index')
            ->with('update', 'Lokasi proyek berhasil diperbarui!');
    }

    /* =====================================================
        DELETE (Staff DIBLOK)
    ===================================================== */
    public function destroy($id)
    {
        $this->blockStaff();

        $lokasi = LokasiProyek::with('media')->findOrFail($id);

        // Hapus file media
        foreach ($lokasi->media as $m) {
            Storage::disk('public')->delete($m->file_name);
            $m->delete();
        }

        $lokasi->delete();

        return redirect()->route('lokasi.index')
            ->with('delete', 'Lokasi proyek berhasil dihapus!');
    }
}
