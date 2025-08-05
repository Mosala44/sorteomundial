<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bombo4 extends Model
{
    use HasFactory;
    protected $table = 'bombo4';
    protected $fillable = ['nombre', 'ranking', 'confederacion'];
}
