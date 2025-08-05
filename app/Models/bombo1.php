<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bombo1 extends Model
{
    use HasFactory;
    protected $table = 'bombo1';
    protected $fillable = ['nombre', 'ranking', 'confederacion'];

}
