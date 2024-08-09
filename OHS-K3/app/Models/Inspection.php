<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $fillable = [
        'plant',
        'area',
        'sub_area',
        'category',
        'status',
        'condition',
        'description',
        'recommendation',
        'inspection_date',
        'reporten',
        'user_id',
    ];
}
