<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    /* =====================================================
        STAFF PROTECTION
        Staff tidak boleh edit, update, delete data warga
    ===================================================== */
    private function blockStaff()
    {
        if (Auth::check() && Auth::user()->role === 'Staff') {
            abort(403, 'Staff tidak diperbolehkan mengubah atau menghapus data warga.');
        }
    }

    /* =====================================================
        INDEX — List Data Warga
    ===================================================== */
    public function index(Request $request)
    {
        $filterable = ['jenis_kelamin', 'agama', 'pekerjaan'];
        $searchable = ['nama', 'no_ktp', 'email', 'pekerjaan'];

        $data['dataWarga'] = Warga::orderBy('nama')
            ->filter($request, $filterable)
            ->search($request, $searchable)
            ->paginate(12)
            ->withQueryString();

        return view('pages.guest.warga.index', $data);
    }

    /* =====================================================
        CREATE — Form Tambah Warga
    ===================================================== */
    public function create()
    {
        return view('pages.guest.warga.create');
    }

    /* =====================================================
        STORE — Simpan data warga
    ===================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp',
            'nama'          => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'agama'         => 'nullable|string',
            'pekerjaan'     => 'nullable|string',
            'telp'          => 'nullable|string',
            'email'         => 'nullable|email|unique:warga,email',
        ]);

        Warga::create([
            'no_ktp'        => $request->no_ktp,
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama'         => $request->agama,
            'pekerjaan'     => $request->pekerjaan,
            'telp'          => $request->telp,
            'email'         => $request->email,
        ]);

        return redirect()->route('warga.index')
            ->with('success', 'Data Warga berhasil ditambahkan!');
    }

    /* =====================================================
        EDIT — Form Edit Warga
        STAFF DIBLOK
    ===================================================== */
    public function edit($id)
    {
        $this->blockStaff();

        $data['dataWarga'] = Warga::findOrFail($id);
        return view('pages.guest.warga.edit', $data);
    }

    /* =====================================================
        UPDATE — Perbarui Data Warga
        STAFF DIBLOK
    ===================================================== */
    public function update(Request $request, $id)
    {
        $this->blockStaff();

        $warga = Warga::findOrFail($id);

        $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp,' . $warga->warga_id . ',warga_id',
            'nama'          => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'agama'         => 'nullable|string',
            'pekerjaan'     => 'nullable|string',
            'telp'          => 'nullable|string',
            'email'         => 'nullable|email|unique:warga,email,' . $warga->warga_id . ',warga_id',
        ]);

        $warga->update([
            'no_ktp'        => $request->no_ktp,
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama'         => $request->agama,
            'pekerjaan'     => $request->pekerjaan,
            'telp'          => $request->telp,
            'email'         => $request->email,
        ]);

        return redirect()->route('warga.index')
            ->with('update', 'Data Warga berhasil diperbarui!');
    }

    /* =====================================================
        DESTROY — Hapus Warga
        STAFF DIBLOK
    ===================================================== */
    public function destroy($id)
    {
        $this->blockStaff();

        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')
            ->with('delete', 'Data Warga berhasil dihapus!');
    }

    /* =====================================================
        SHOW — Detail Warga
    ===================================================== */
    public function show($id)
    {
        $dataWarga = Warga::findOrFail($id);
        return view('pages.guest.warga.show', compact('dataWarga'));
    }
}
