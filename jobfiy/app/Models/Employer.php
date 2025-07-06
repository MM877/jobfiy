<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_name',
        'user_id', // Ensure user_id is fillable for mass assignment
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

}
