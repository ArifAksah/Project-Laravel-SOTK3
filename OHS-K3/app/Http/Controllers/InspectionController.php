<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InspectionController extends Controller
{
    // Menampilkan semua data inspeksi
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'admin') {
            $inspections = Inspection::all();
        } else {
            $inspections = Inspection::where('user_id', $user->id)->get();
        }
        return view('Content.Inspection.index', compact('inspections'));
    }

    // Menampilkan form untuk menambahkan data inspeksi baru
    public function create()
    {
        return view('Content.Inspection.create');
    }

    
    // Menyimpan data inspeksi baru
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'plant' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'sub_area' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'condition' => 'required|string',
            'description' => 'required|string',
            'recommendation' => 'required|string',
            'inspection_date' => 'required|date',
            'reporten' => 'required|string|max:255',
            'image' => 'nullable|string'  // Validasi gambar sebagai string (Base64)
        ]);
    
        // Tambahkan user_id secara manual
        $validatedData['user_id'] = auth()->id();
    
        // Proses decoding Base64 menjadi file gambar dan simpan
        if (!empty($validatedData['image'])) {
            $imageData = $validatedData['image'];
            $imageName = 'inspections/' . uniqid() . '.png'; // Nama file yang unik
            Storage::disk('public')->put($imageName, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)));
            $validatedData['image'] = $imageName;
        }
    
        // Simpan data inspeksi beserta gambar jika ada
        Inspection::create($validatedData);
    
        return redirect()->route('inspections.index')
            ->with('success', 'Data inspeksi berhasil ditambahkan.');
    }
    
    

    public function show(Inspection $inspection)
    {
        return view('Content.Inspection.show', compact('inspection'));
    }

    // Menampilkan form untuk mengedit data inspeksi
    public function edit(Inspection $inspection)
    {
        return view('Content.Inspection.edit', compact('inspection'));
    }

    // Memperbarui data inspeksi yang sudah ada
    public function update(Request $request, Inspection $inspection)
    {
        $request->validate([
            'plant' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'sub_area' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'condition' => 'required|string',
            'description' => 'required|string',
            'recommendation' => 'required|string',
            'inspection_date' => 'required|date',
            'reporten' => 'required|string|max:255',
        ]);

        $inspection->update($request->all());

        return redirect()->route('inspections.index')
            ->with('success', 'Data inspeksi berhasil diperbarui.');
    }

    // Menghapus data inspeksi
    public function destroy(Inspection $inspection)
    {
        $inspection->delete();

        return redirect()->route('inspections.index')
            ->with('success', 'Data inspeksi berhasil dihapus.');
    }
}
