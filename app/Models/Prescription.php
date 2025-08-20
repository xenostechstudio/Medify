<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Prescription extends Model
{
    protected $fillable = [
        'customer_id',
        'prescription_number',
        'doctor_name',
        'doctor_license',
        'date_issued',
        'status',
        'notes',
    ];

    protected $casts = [
        'date_issued' => 'date',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PrescriptionItem::class);
    }

    public function sale(): HasOne
    {
        return $this->hasOne(Sale::class);
    }
}
