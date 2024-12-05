<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = [
        'kode_item',
        'nama_item',
    ];

    /**
     * Get all of the Komponen for the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function components()
    {
        return $this->hasMany(Komponen::class, 'nomor_item', 'kode_item');
    }
    public function batchproduction() {
        return $this->hasMany(DetailBatch::class, 'kode_batch', 'nomor_batch');
    }
}
