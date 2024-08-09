<?php

namespace App\Http\Controllers;

use App\Models\Finding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FindingController extends Controller
{
    public function index()
    {
        $findings = Finding::paginate(10); 
        return view('dashboard.finding.index', compact('findings'));
    }

    public function create()
    {
        return view('dashboard.finding.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar_temuan' => 'nullable|image|max:2048',
            'group' => 'required|string|max:255',
            'plant' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'sub_area' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'description' => 'nullable|string',
            'recommendation' => 'nullable|string',
            'inspection_date' => 'required|date',
        ]);

        $finding = new Finding($request->all());

        if ($request->hasFile('gambar_temuan')) {
            $gambar_temuanPath = $request->file('gambar_temuan')->storeAs('public/images', $request->file('gambar_temuan')->getClientOriginalName());
            $finding->gambar_temuan = str_replace('public/', '', $gambar_temuanPath);
        }

        // Get the authenticated user's name and save it to the dibuat_oleh field
        $finding->dibuat_oleh = Auth::user()->name;
        $finding->id_user = Auth::id();

        $finding->save();

        return redirect()->route('findings.index')->with('success', 'Finding created successfully.');
    }

    public function show(Finding $finding)
    {
        return view('dashboard.finding.show', compact('finding'));
    }

    public function edit(Finding $finding)
    {
        return view('dashboard.finding.edit', compact('finding'));
    }

    public function update(Request $request, Finding $finding)
    {
        $request->validate([
            'gambar_temuan' => 'nullable|image|max:2048',
            'group' => 'required|string|max:255',
            'plant' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'sub_area' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'description' => 'nullable|string',
            'recommendation' => 'nullable|string',
            'inspection_date' => 'required|date',
        ]);

        $finding->update($request->all());

        if ($request->hasFile('gambar_temuan')) {
            $gambar_temuanPath = $request->file('gambar_temuan')->storeAs('public/images', $request->file('gambar_temuan')->getClientOriginalName());
            $finding->gambar_temuan = str_replace('public/', '', $gambar_temuanPath);
        }

        return redirect()->route('findings.index')->with('success', 'Finding updated successfully.');
    }

    public function destroy(Finding $finding)
    {
        $finding->delete();
        return redirect()->route('findings.index')->with('success', 'Finding deleted successfully.');
    }
    public function myFindings()
    {
        $user = Auth::user();
        $findings = Finding::where('id_user', $user->id)->paginate(10); // Anda bisa menyesuaikan jumlah per halaman
        return view('dashboard.finding.myfinding', compact('findings'));
    }

    // Metode untuk menampilkan semua temuan
    public function allFindings()
    {
        $findings = Finding::paginate(10); // Anda bisa menyesuaikan jumlah per halaman
        return view('dashboard.finding.allfinding', compact('findings'));
    }
}
