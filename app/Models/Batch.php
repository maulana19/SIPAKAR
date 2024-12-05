<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batch';
    protected $fillable = [
        'kode_batch',
        'nama_batch',
        'status',
        'created_by',
    ];

    /**
     * Get all of the componentBatch for the Batch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function componentBatch()
    {
        return $this->hasMany(DetailBatch::class, 'nomor_batch', 'kode_batch');
    }

    /**
     * Get all of the PembagianArea for the Batch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Area()
    {
        return $this->hasMany(Penugasan::class, 'nomor_batch', 'kode_batch');
    }
}
