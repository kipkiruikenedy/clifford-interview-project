<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_rates',
        'start_date',
        'end_date',
        'accommodation_id',  // Foreign key for Accommodation
        'user_id',           // Foreign key for User (Travel Agent)
    ];
}
