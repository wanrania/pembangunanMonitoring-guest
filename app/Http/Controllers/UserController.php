<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /* =====================================================
        STAFF PROTECTION
        Staff tidak boleh edit / update / delete user
    ===================================================== */
    private function blockStaff()
    {
        if (Auth::check() && Auth::user()->role === 'Staff') {
            abort(403, 'Staff tidak diperbolehkan mengubah atau menghapus data user.');
        }
    }

    /* =====================================================
        INDEX — List User
    ===================================================== */
    public function index(Request $request)
    {
        $filterable = ['name', 'email'];
        $searchable = ['name', 'email'];

        $dataUser = User::filter($request, $filterable)
            ->search($request, $searchable)
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('pages.guest.user.index', compact('dataUser'));
    }

    /* =====================================================
        CREATE — Form Tambah User
    ===================================================== */
    public function create()
    {
        $roles = ['Admin', 'Staff', 'User']; // pilih role
        return view('pages.guest.user.create', compact('roles'));
    }

    /* =====================================================
        STORE — Simpan User Baru
    ===================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan!');
    }

    /* =====================================================
        EDIT — Form Edit User
        STAFF DIBLOK
    ===================================================== */
    public function edit($id)
    {
        $this->blockStaff();

        $dataUser = User::findOrFail($id);
        $roles    = ['Admin', 'Staff', 'User'];

        return view('pages.guest.user.edit', compact('dataUser', 'roles'));
    }

    /* =====================================================
        UPDATE — Simpan Perubahan User
        STAFF DIBLOK
    ===================================================== */
    public function update(Request $request, $id)
    {
        $this->blockStaff();

        $dataUser = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $dataUser->id,
            'password' => 'nullable|min:6',
            'role'     => 'required',
        ]);

        // Data wajib
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ];

        // Update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $dataUser->update($data);

        return redirect()->route('user.index')
            ->with('update', 'Data user berhasil diperbarui!');
    }

    /* =====================================================
        DESTROY — Hapus User
        STAFF DIBLOK
    ===================================================== */
    public function destroy($id)
    {
        $this->blockStaff();

        User::findOrFail($id)->delete();

        return redirect()->route('user.index')
            ->with('delete', 'User berhasil dihapus!');
    }
}
