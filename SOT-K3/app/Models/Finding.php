<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finding extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar_temuan',
        'group',
        'plant',
        'area',
        'sub_area',
        'category',
        'status',
        'condition',
        'description',
        'recommendation',
        'inspection_date',
    ];
}
