<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthly extends Model
{
    use HasFactory;

    protected $table = 'monthly';
    protected $fillable = ['user_id', 'description', 'tags', 'price', 'paid_by', 'same_price', 'last_inserted_date', 'start_date', 'end_date'];
    protected $dates = ['start_date', 'last_inserted_date', 'end_date'];

}

