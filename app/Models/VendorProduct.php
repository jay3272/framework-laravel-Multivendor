<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'product_id',
        'vendor_price',
        'vendor_quantity',
        'is_approved',
    ];

    protected $casts = [
        'vendor_price' => 'decimal:2',
        'vendor_quantity' => 'integer',
        'is_approved' => 'boolean',
    ];

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
