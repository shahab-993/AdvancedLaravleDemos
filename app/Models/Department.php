<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = ['name','location'];
    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
