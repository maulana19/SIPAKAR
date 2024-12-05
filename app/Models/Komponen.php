<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    protected $table = 'component';
    protected $fillable = [
        'kode_komponen',
        'nama_komponen',
        'nomor_item',
        'panjang',
        'lebar',
        'tinggi',
        'zona',
        'jenis',
        'pola',
    ];

    /**
     * Get the Item that owns the Komponen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'nomor_item', 'kode_item');
    }
}
