<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    /**
     * Tampilkan daftar permintaan persetujuan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua pengguna dengan role 'quest' tanpa melihat nilai 'is_approved'
        $users = User::where('role', 'quest')->get();
        return view('Content.Admin_approval.index', compact('users'));
    }

    /**
     * Menyetujui permintaan.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);
        $user->update([
            'is_approved' =>true,   
        ]);

        return redirect()->route('admin_approvals.index')->with('success', 'User approved successfully.');
    }

    /**
     * Menolak permintaan.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);
        $user->update([
            'is_approved' => 3, // Ubah nilai is_approved menjadi -1 jika ditolak
        ]);
    
        return redirect()->route('admin_approvals.index')->with('success', 'User request rejected.');
    }
}
