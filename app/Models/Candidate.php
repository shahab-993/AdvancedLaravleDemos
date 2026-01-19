<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model {
    protected $fillable = [
        'firstname', 'lastname', 'middlename', 'password', 'gender', 'birthdate', 'hiredate', 'emial', 'phone', 'postalcode',
        'websiteurl', 'role', 'termsandconditions', 'age', 'salary', 'amount', 'secondary_emlail', 'profile_picture'
    ];

}
