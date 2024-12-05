<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Progress;

class Penugasan extends Model
{

    protected $table = 'penugasan';
    protected $fillable = [
        'kode_penugasan',
        'nomor_batch',
        'user_id',
    ];

    /**
     * Get the Batch that owns the Penugasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Batch()
    {
        return $this->belongsTo(Batch::class, 'nomor_batch','kode_batch');
    }
    /**
     * Get the user that owns the Penugasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Admin()
    {
        return $this->belongsTo(User::class, 'user_id', 'kode_user');
    }

    /**
     * Get all of the Pengerjaan for the Penugasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Pengerjaan()
    {
        return $this->hasMany(ProgressProduksi::class, 'nomor_penugasan', 'kode_penugasan');
    }
}
