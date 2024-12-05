<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressProduksi extends Model
{
    protected $table = 'progress';
    protected $fillable = [
        'kode_progres',
        'nomor_penugasan',
        'nomor_detail',
        'selesai',
        'kurang',
    ];

    /**
     * Get the detailBatch associated with the ProgressProduksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detailBatch()
    {
        return $this->hasOne(DetailBatch::class, 'kode_detail', 'nomor_detail');
    }

    /**
     * Get the Tugas that owns the ProgressProduksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Tugas()
    {
        return $this->belongsTo(Penugasan::class, 'nomor_penugasan', 'kode_penugasan');
    }
}
