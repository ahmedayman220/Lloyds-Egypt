<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplierItem() {
        return $this->hasMany(SupplierItem::class, 'category_id');
    }
}
