<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TahapanProyekController extends Controller
{
    /* =====================================================
        ROLE PROTECTION
        Staff hanya boleh melihat & create
        Staff TIDAK boleh edit / update / delete
    ===================================================== */
    private function blockStaff()
    {
        if (Auth::check() && Auth::user()->role === 'Staff') {
            abort(403, 'Staff tidak diperbolehkan mengubah atau menghapus tahapan proyek.');
        }
    }

    /* =====================================================
        INDEX — List Tahapan Proyek
    ===================================================== */
    public function index(Request $request)
    {
        $filterable = ['nama_tahap'];
        $searchable = ['proyek.nama_proyek'];

        $data['data'] = TahapanProyek::with('proyek')
            ->filter($request, $filterable)
            ->search($request, $searchable)
            ->orderByDesc('tahap_id')
            ->paginate(9)
            ->withQueryString();

        $data['listTahap'] = TahapanProyek::select('nama_tahap')
            ->distinct()
            ->orderBy('nama_tahap')
            ->pluck('nama_tahap');

        return view('pages.guest.tahapan_proyek.index', $data);
    }

    /* =====================================================
        CREATE — Form tambah tahapan
        Staff boleh create
    ===================================================== */
    public function create()
    {
        return view('pages.guest.tahapan_proyek.create', [
            'proyek' => Proyek::orderBy('nama_proyek')->get(),
        ]);
    }

    /* =====================================================
        STORE — Simpan data tahapan
    ===================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'proyek_id'     => 'required|exists:proyek,proyek_id',
            'nama_tahap'    => 'required',
            'target_persen' => 'required|numeric|min:0|max:100',
            'tgl_mulai'     => 'required|date',
            'tgl_selesai'   => 'required|date|after_or_equal:tgl_mulai',
        ]);

        TahapanProyek::create(
            $request->only(['proyek_id', 'nama_tahap', 'target_persen', 'tgl_mulai', 'tgl_selesai'])
        );

        return redirect()->route('tahapan.index')
            ->with('success', 'Tahapan proyek berhasil ditambahkan');
    }

    /* =====================================================
        SHOW — Detail Tahapan
    ===================================================== */
    public function show($id)
    {
        return view('pages.guest.tahapan_proyek.show', [
            'tahapan' => TahapanProyek::with('proyek')->findOrFail($id),
        ]);
    }

    /* =====================================================
        EDIT — Form edit
        STAFF DIBLOK
    ===================================================== */
    public function edit($id)
    {
        $this->blockStaff();

        return view('pages.guest.tahapan_proyek.edit', [
            'tahapan' => TahapanProyek::findOrFail($id),
            'proyek'  => Proyek::orderBy('nama_proyek')->get(),
        ]);
    }

    /* =====================================================
        UPDATE — Simpan perubahan
        STAFF DIBLOK
    ===================================================== */
    public function update(Request $request, $id)
    {
        $this->blockStaff();

        $request->validate([
            'proyek_id'     => 'required|exists:proyek,proyek_id',
            'nama_tahap'    => 'required',
            'target_persen' => 'required|numeric|min:0|max:100',
            'tgl_mulai'     => 'required|date',
            'tgl_selesai'   => 'required|date|after_or_equal:tgl_mulai',
        ]);

        TahapanProyek::findOrFail($id)->update(
            $request->only(['proyek_id', 'nama_tahap', 'target_persen', 'tgl_mulai', 'tgl_selesai'])
        );

        return redirect()->route('tahapan.index')
            ->with('update', 'Tahapan proyek berhasil diperbarui');
    }

    /* =====================================================
        DESTROY — Hapus Tahapan
        STAFF DIBLOK
    ===================================================== */
    public function destroy($id)
    {
        $this->blockStaff();

        TahapanProyek::destroy($id);

        return back()->with('delete', 'Tahapan proyek berhasil dihapus');
    }
}
