<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    protected $table = 'inventories';
    
    protected $fillable = [
        'medicine_id',
        'batch_number',
        'expiry_date',
        'quantity',
        'cost_price',
        'selling_price',
        'supplier_id',
        'received_date',
    ];

    protected $casts = [
        'expiry_date' => 'date',
        'cost_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'received_date' => 'date',
    ];

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }

    public function getIsExpiredAttribute(): bool
    {
        return $this->expiry_date < now();
    }

    public function getIsNearExpiryAttribute(): bool
    {
        return $this->expiry_date <= now()->addDays(30);
    }
}
