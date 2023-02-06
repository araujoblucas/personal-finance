<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'description',
        'price',
        'tags',
        'is_monthly',
        'actual_installment',
        'number_of_installments',
        'price_of_installments',
        'paid_by',
        'is_paid',
        'user_id',
        'monthly_id'
    ];

    protected $casts = [
        'is_paid' => 'boolean'
    ];

    protected $dates = [
        'reference', 'updated_at', 'created_at'
    ];

    public function pay()
    {
        $this->update(['is_paid' => true]);
        $this->save();
    }
}
