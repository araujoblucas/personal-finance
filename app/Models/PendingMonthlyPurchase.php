<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingMonthlyPurchase extends Model
{
    use HasFactory;

    protected $table = 'pending_monthly_purchases';
    protected $fillable = [
        'user_id',
        'reference',
        'description',
        'tags',
        'price',
        'paid_by',
        'monthly_id'
    ];

}
