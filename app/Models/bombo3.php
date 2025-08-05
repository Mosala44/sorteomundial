<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bombo3 extends Model
{
    use HasFactory;
    protected $table = 'bombo3';
    protected $fillable = ['nombre', 'ranking', 'confederacion'];
}
