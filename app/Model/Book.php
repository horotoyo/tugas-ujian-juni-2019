<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    	'isbn', 'category_id', 'title', 'description', 'author', 'publisher', 'print', 'date_rilies', 'place_rilies', 'quantity', 'created_at', 'updated_at',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

	public function borrow()
    {
    	return $this->hasMany(Borrow::class);
    }
}
