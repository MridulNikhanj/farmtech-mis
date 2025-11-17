<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_photo',
        'fpo_registration_no',
        'associated_fpo',
        'farmer_name',
        'father_name',
        'gender',
        'date_of_birth',
        'address',
        'pin_code',
        'state',
        'district',
        'block',
        'aadhar_no',
        'mobile_no',
        'email',
        'equity_share',
        'equity_amount',
        'area_type',
        'status'
    ];
}
