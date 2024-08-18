<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    // Menampilkan daftar semua karyawan
    public function index()
    {
        $karyawans = User::where('role', 'user')->get();
        return view('karyawan.index', compact('karyawans'));
    }

    // Menampilkan form untuk menambahkan karyawan baru
    public function create()
    {
        return view('karyawan.create');
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'asal_perusahaan' => 'PT. Semen Tonasa',
            'role' => 'user',
            'password' => Hash::make($validatedData['password']),
            'is_approved' => true,
            'timezone' => 'Asia/Makassar', // Set default timezone
        ]);

        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // Menampilkan detail karyawan
    public function show(User $user)
    {
        return view('karyawan.show', compact('user'));
    }

    // Menampilkan form untuk mengedit data karyawan
    public function edit(User $user)
    {
        return view('karyawan.edit', compact('user'));
    }

    // Memperbarui data karyawan yang sudah ada
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->update([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'asal_perusahaan' => 'PT. Semen Tonasa',
            'role' => 'user',
            'password' => $request->filled('password') ? Hash::make($validatedData['password']) : $user->password,
            'is_approved' => true,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    // Menghapus data karyawan
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
