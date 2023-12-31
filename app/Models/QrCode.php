<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function trainings()
    {
        return $this->hasMany(Training::class, 'qrCode_id');
    }
}
