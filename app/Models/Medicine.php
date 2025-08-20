<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'generic_name',
        'brand',
        'category_id',
        'manufacturer',
        'dosage_form',
        'strength',
        'description',
        'barcode',
        'min_stock_level',
        'requires_prescription',
        'is_active',
    ];

    protected $casts = [
        'min_stock_level' => 'decimal:2',
        'requires_prescription' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }

    public function prescriptionItems(): HasMany
    {
        return $this->hasMany(PrescriptionItem::class);
    }

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }

    public function getTotalStockAttribute(): int
    {
        return $this->inventory()->sum('quantity');
    }

    public function getIsLowStockAttribute(): bool
    {
        return $this->total_stock <= $this->min_stock_level;
    }
}
