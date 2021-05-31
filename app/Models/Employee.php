<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $fillable = [
        'first_name', 'last_name', 'email', 'phone',
    ];

    /**
     * Relations
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}