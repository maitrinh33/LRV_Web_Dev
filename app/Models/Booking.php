<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['service_id', 'customer_name', 'customer_email', 'customer_phone', 'booking_date', 'booking_time', 'message'];
}
