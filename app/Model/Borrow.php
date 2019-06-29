<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
    	'member_id', 'book_id', 'staff_name', 'time_period', 'borrow_date', 'return_date', 'status', 'note', 'created_at', 'updated_at',
    ];

    public function member()
    {
    	return $this->belongsTo(Member::class);
    }

	public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
