<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'prefix',
        'first_name',
        'last_name',
        'id_card',
        'birthdate',
        'phone',
        'appointment_date',
        'admin_approve_status'
    ];
}
