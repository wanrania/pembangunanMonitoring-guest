<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        return view('pages.guest.user.index', compact('dataUser'));
    }

    public function create()
    {
        return view('pages.guest.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dataUser = User::findOrFail($id);
        return view('pages.guest.user.edit', compact('dataUser'));
    }

    public function update(Request $request, $id)
    {
        $dataUser = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.$dataUser->id,
            'password' => 'nullable|min:6'
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $dataUser->update($data);

        return redirect()->route('user.index')->with('update', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('delete', 'User berhasil dihapus!');
    }
}
