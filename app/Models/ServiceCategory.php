<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function serviceItems()
    {
        return $this->hasMany(ServiceItem::class , 'category_id');
    }

}
