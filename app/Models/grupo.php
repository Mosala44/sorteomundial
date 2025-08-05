<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
    use HasFactory;
    protected $fillable = [
        'sorteo_id',
        'bombo1_id',
        'bombo2_id',
        'bombo3_id',
        'bombo4_id',
    ];

    // Relación con Sorteo
    public function sorteo()
    {
        return $this->belongsTo(Sorteo::class);
    }

    // Relaciones con los bombos
    public function bombo1()
    {
        return $this->belongsTo(Bombo1::class);
    }

    public function bombo2()
    {
        return $this->belongsTo(Bombo2::class);
    }

    public function bombo3()
    {
        return $this->belongsTo(Bombo3::class);
    }

    public function bombo4()
    {
        return $this->belongsTo(Bombo4::class);
    }
}
