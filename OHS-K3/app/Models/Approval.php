<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    // Atribut yang bisa diisi
    protected $table = 'admin_approvals';
    protected $fillable = ['user_id', 'approved_at','is_approved'];

    protected $casts = [
        'is_approved' => 'boolean', // Cast as boolean
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

