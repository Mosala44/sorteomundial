<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bombo2 extends Model
{
    use HasFactory;
    protected $table = 'bombo2';
    protected $fillable = ['nombre', 'ranking', 'confederacion'];
}
