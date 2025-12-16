<?php

namespace App\Http\Controllers;

use App\Models\Kontraktor;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontraktorController extends Controller
{
    /* =====================================================
        ROLE PROTECTION
        Staff hanya boleh melihat & create
        Staff TIDAK boleh edit / update / delete
    ===================================================== */
    private function blockStaff()
    {
        if (Auth::check() && Auth::user()->role === 'Staff') {
            abort(403, 'Staff tidak diperbolehkan mengubah atau menghapus data kontraktor.');
        }
    }

    /* =====================================================
        INDEX
    ===================================================== */
    public function index(Request $request)
    {
        $filterable = ['proyek_id'];
        $searchable = ['nama', 'penanggung_jawab', 'kontak', 'alamat'];

        $data = Kontraktor::with('proyek')
            ->filter($request, $filterable)
            ->search($request, $searchable)
            ->orderByDesc('kontraktor_id')
            ->paginate(12)
            ->withQueryString();

        $listProyek = Proyek::orderBy('nama_proyek')->get();

        return view('pages.guest.kontraktor.index', compact('data', 'listProyek'));
    }

    /* =====================================================
        CREATE
        (Staff boleh create)
    ===================================================== */
    public function create()
    {
        return view('pages.guest.kontraktor.create', [
            'proyek' => Proyek::orderBy('nama_proyek')->get(),
        ]);
    }

    /* =====================================================
        STORE
    ===================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'proyek_id'        => 'required|exists:proyek,proyek_id',
            'nama'             => 'required',
            'penanggung_jawab' => 'required',
            'kontak'           => 'required',
            'alamat'           => 'nullable',
        ]);

        Kontraktor::create(
            $request->only(['proyek_id', 'nama', 'penanggung_jawab', 'kontak', 'alamat'])
        );

        return redirect()->route('kontraktor.index')
            ->with('success', 'Data kontraktor berhasil ditambahkan!');
    }

    /* =====================================================
        EDIT (Staff DIBLOK)
    ===================================================== */
    public function edit($id)
    {
        $this->blockStaff();

        return view('pages.guest.kontraktor.edit', [
            'data'   => Kontraktor::findOrFail($id),
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
            'proyek_id'        => 'required|exists:proyek,proyek_id',
            'nama'             => 'required',
            'penanggung_jawab' => 'required',
            'kontak'           => 'required',
            'alamat'           => 'nullable',
        ]);

        Kontraktor::findOrFail($id)->update(
            $request->only(['proyek_id', 'nama', 'penanggung_jawab', 'kontak', 'alamat'])
        );

        return redirect()->route('kontraktor.index')
            ->with('update', 'Data kontraktor berhasil diperbarui!');
    }

    /* =====================================================
        DELETE (Staff DIBLOK)
    ===================================================== */
    public function destroy($id)
    {
        $this->blockStaff();

        Kontraktor::findOrFail($id)->delete();

        return redirect()->route('kontraktor.index')
            ->with('delete', 'Data kontraktor berhasil dihapus!');
    }
}
