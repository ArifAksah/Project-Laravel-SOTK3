<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    // Menampilkan semua data inspeksi
    public function index()
    {
        $inspections = Inspection::all();
        return view('inspections.index', compact('inspections'));
    }

    // Menampilkan form untuk menambahkan data inspeksi baru
    public function create()
    {
        return view('inspections.create');
    }

    // Menyimpan data inspeksi baru
    public function store(Request $request)
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
            'user_id' => auth()->id(),
        ]);

        Inspection::create($request->all());

        return redirect()->route('inspections.index')
            ->with('success', 'Data inspeksi berhasil ditambahkan.');
    }

    // Menampilkan data inspeksi tertentu
    public function show(Inspection $inspection)
    {
        return view('inspections.show', compact('inspection'));
    }

    // Menampilkan form untuk mengedit data inspeksi
    public function edit(Inspection $inspection)
    {
        return view('inspections.edit', compact('inspection'));
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
