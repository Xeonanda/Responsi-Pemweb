<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemasok extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'contact',
        'address'
    ];
}
