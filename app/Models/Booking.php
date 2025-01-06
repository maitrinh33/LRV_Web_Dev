<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Specify fillable fields for mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'service',
        'message',
        'status',
        'user_id', 
        'cancellation_reason',  // Allow mass assignment for cancellation_reason
    ];
    
    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor to get the display status with cancellation datetime
    public function getDisplayStatusAttribute()
    {
        if (str_contains($this->status, 'Cancelled on')) {
            return $this->status; // Return the full status with cancellation datetime
        }

        return ucfirst($this->status); // Return the regular status
    }
}

