<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowRequest extends Model
{
    protected $fillable = ['item_id', 'user_id', 'status', 'start_date', 'end_date'];
}
