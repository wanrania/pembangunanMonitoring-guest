<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\ProgresProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProgresProyekController extends Controller
{
    /* =====================================================
        ROLE PROTECTION (Staff tidak boleh edit/delete)
    ===================================================== */
    private function blockStaff()
    {
        if (Auth::check() && Auth::user()->role === 'Staff') {
            abort(403, 'Staff tidak diperbolehkan mengedit atau menghapus progres.');
        }
    }

    /* =====================================================
        INDEX
    ===================================================== */
    public function index(Request $request)
    {
        $filterable = ['proyek_id', 'tahap_id', 'tanggal'];
        $searchable = ['catatan'];

        $query = ProgresProyek::with(['proyek', 'tahap', 'media'])
            ->orderByDesc('tanggal')
            ->filter($request, $filterable)
            ->search($request, $searchable);

        // Filter range progres (0-25, 26-50, dll)
        if ($request->filled('progres')) {
            [$min, $max] = explode('-', $request->progres);
            $query->whereBetween('persen_real', [$min, $max]);
        }

        return view('pages.guest.progres.index', [
            'data'   => $query->paginate(12)->withQueryString(),
            'proyek' => Proyek::all(),
            'tahap'  => TahapanProyek::all(),
        ]);
    }

    /* =====================================================
        CREATE
    ===================================================== */
    public function create()
    {
        return view('pages.guest.progres.create', [
            'proyek' => Proyek::all(),
            'tahap'  => TahapanProyek::all(),
        ]);
    }

    /* =====================================================
        STORE
       (Staff boleh tambah progres)
    ===================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'proyek_id'   => 'required',
            'tahap_id'    => 'required',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal'     => 'required|date',
            'catatan'     => 'nullable|string',
            'media.*'     => 'nullable|image|max:2048',
        ]);

        $progres = ProgresProyek::create($request->except('media'));

        // Upload media
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $i => $file) {
                $path = $file->store('media_progres', 'public');

                Media::create([
                    'ref_table'  => 'progres_proyek',
                    'ref_id'     => $progres->progres_id,
                    'file_name'  => $path,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('progres.index')
            ->with('success', 'Progres berhasil ditambahkan');
    }

    /* =====================================================
        SHOW
    ===================================================== */
    public function show($id)
    {
        $data = ProgresProyek::with(['media', 'proyek', 'tahap'])
            ->findOrFail($id);

        return view('pages.guest.progres.show', compact('data'));
    }

    /* =====================================================
        EDIT (Staff DIBLOK)
    ===================================================== */
    public function edit($id)
    {
        $this->blockStaff(); // 👈 Cegah Staff masuk halaman edit

        return view('pages.guest.progres.edit', [
            'data'   => ProgresProyek::with('media')->findOrFail($id),
            'proyek' => Proyek::all(),
            'tahap'  => TahapanProyek::all(),
        ]);
    }

    /* =====================================================
        UPDATE (Staff DIBLOK)
    ===================================================== */
    public function update(Request $request, $id)
    {
        $this->blockStaff(); // 👈 Staff tidak boleh update

        $request->validate([
            'proyek_id'   => 'required',
            'tahap_id'    => 'required',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal'     => 'required|date',
            'catatan'     => 'nullable|string',
            'media.*'     => 'nullable|image|max:2048',
        ]);

        $progres = ProgresProyek::findOrFail($id);
        $progres->update($request->except('media'));

        // Tambah media baru
        if ($request->hasFile('media')) {

            $lastSort = Media::where('ref_table', 'progres_proyek')
                ->where('ref_id', $progres->progres_id)
                ->max('sort_order') ?? 0;

            foreach ($request->file('media') as $i => $file) {
                $path = $file->store('media_progres', 'public');

                Media::create([
                    'ref_table'  => 'progres_proyek',
                    'ref_id'     => $progres->progres_id,
                    'file_name'  => $path,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $lastSort + $i + 1,
                ]);
            }
        }

        return redirect()->route('progres.index')
            ->with('update', 'Progres berhasil diperbarui');
    }

    /* =====================================================
        DELETE (Staff DIBLOK)
    ===================================================== */
    public function destroy($id)
    {
        $this->blockStaff(); // 👈 Staff tidak boleh hapus

        $progres = ProgresProyek::with('media')->findOrFail($id);

        foreach ($progres->media as $m) {
            Storage::disk('public')->delete($m->file_name);
            $m->delete();
        }

        $progres->delete();

        return back()->with('delete', 'Progres berhasil dihapus');
    }
}
