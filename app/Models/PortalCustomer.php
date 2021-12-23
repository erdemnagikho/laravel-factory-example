<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalCustomer extends Model
{
    use HasFactory;

    protected $table = 'portal_customers';

    protected $fillable = [
        'identity_no',
        'name',
        'surname',
        'birth_year',
    ];
}
