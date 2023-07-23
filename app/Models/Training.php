<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Courses() {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function Instructors() {
        return $this->belongsTo(Instructors::class, 'instructor_id');
    }

    public function Companies() {
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function QrCodes() {
        return $this->belongsTo(QrCode::class, 'qrCode_id');
    }

    public function serial_numbers() {
        return $this->hasMany(SerialNumber::class, 'training_id');
    }
}
