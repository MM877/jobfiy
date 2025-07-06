<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{ 
    use HasFactory;



// app/Models/Job.php
protected static function newFactory()
{
    return \Database\Factories\JobFactory::new();
}
protected $table = 'job_listings';

// In App/Models/Job.php
protected $fillable = [
    'title', 
    'salary', 
    'email', 
    'phone', 
    'address', 
    'country',
    'is_remote', 
    'description',
    'employer_name',
    'user_id', // Add user_id to fillable
];



 public function employer()
    {
        return $this->belongsTo(Employer::class);
    } 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}





