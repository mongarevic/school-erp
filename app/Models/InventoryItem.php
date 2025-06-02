<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    public $table = 'inventory_items';

    public $fillable = [
        'name',
        'category_id',
        'quantity',
        'unit',
        'minimum_quantity',
        'cost_per_unit',
        'supplier_id',
        'location',
        'description'
    ];

    protected $casts = [
        'name' => 'string',
        'unit' => 'string',
        'cost_per_unit' => 'decimal:2',
        'location' => 'string',
        'description' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'nullable',
        'quantity' => 'required',
        'unit' => 'nullable|string|max:20',
        'minimum_quantity' => 'nullable',
        'cost_per_unit' => 'nullable|numeric',
        'supplier_id' => 'nullable',
        'location' => 'nullable|string|max:100',
        'description' => 'nullable|string|max:65535',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\InventoryCategory::class, 'category_id');
    }

    public function staff(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Staff::class, 'inventory_transactions');
    }
}
