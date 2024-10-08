<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SummaryController extends Controller
{
    // Menampilkan ringkasan inspeksi dengan filter
    public function index(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil input filter dari request
        $plant = $request->input('plant');
        $area = $request->input('area');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query dasar untuk mengambil data inspeksi
        $query = Inspection::query();

        // Jika pengguna bukan admin, filter berdasarkan user_id
        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
        }

        // Filter berdasarkan Plant
        if ($plant) {
            $query->where('plant', $plant);
        }

        // Filter berdasarkan Area
        if ($area) {
            $query->where('area', $area);
        }

        // Filter berdasarkan Rentang Tanggal
        if ($startDate && $endDate) {
            $query->whereBetween('inspection_date', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('inspection_date', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('inspection_date', '<=', $endDate);
        }

        // Eksekusi query dan ambil hasilnya
        $inspections = $query->get();

        // Kembalikan hasilnya ke view
        return view('Content.Inspection.summary', compact('inspections'));
    }
}
