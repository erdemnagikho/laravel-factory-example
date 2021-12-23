<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StarbucksCustomer extends Model
{
    use HasFactory;

    protected $table = 'starbucks_customers';

    protected $fillable = [
        'identity_no',
        'name',
        'surname',
        'birth_year',
    ];
}
