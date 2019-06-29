<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
    	'name', 'address', 'birth_place', 'birth_date', 'email', 'phone', 'created_at', 'updated_at',
    ];

    public function borrow()
    {
    	return $this->hasMany(Borrow::class);
    }
}
