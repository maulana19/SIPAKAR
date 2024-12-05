<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailBatch extends Model
{
    protected $table = 'detail_batch';
    protected $fillable = [
        'kode_detail',
        'nomor_batch',
        'nomor_komponen',
        'target',
    ];

    /**
     * Get all of the batchDetailItem for the DetailBatch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function batchDetailItem()
    {
        return $this->hasManyThrough(Komponen::class, Item::class,);
    }

    /**
     * Get the detailKomponen associated with the DetailBatch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detailKomponen()
    {
        return $this->hasOne(Komponen::class, 'kode_komponen', 'nomor_komponen');
    }
}
