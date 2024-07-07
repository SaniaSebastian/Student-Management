<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['student_id', 'house_name', 'post_office', 'city', 'pincode'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    use HasFactory;
}
