<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'company_id',
    ];

    /**
     * Relations
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Attributes
     */
    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    public function getRegisteredAtAttribute()
    {
        return $this->created_at->setTimeZone('GMT+5:45');
    }
}
