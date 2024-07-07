<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
     'name',
     'dob',
     'admission_number',
     'father_name',
     'mother_name',
     'class',
     'division'];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function subjectMarks()
    {
        return $this->hasMany(SubjectMark::class);
    }
    use HasFactory;
}
