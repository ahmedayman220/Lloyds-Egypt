<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function companies()
    {
        return $this->hasMany(Training::class, 'company_id');
    }
}
