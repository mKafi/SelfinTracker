<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    protected $fillable = [
        'hash',
        'userType',
        'referer',
        'nick',
        'fullName',
        'phone',
        'alternatePhone',
        'email',
        'gender',
        'age',
        'occupation',
        'designation',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'currentLocation',
        'image',
        'socialLinks',
        'shortDescription',
        'longDescription',
        'lastUsed',
        'expiringOn',
        'status',
        'flag'
    ];
}
