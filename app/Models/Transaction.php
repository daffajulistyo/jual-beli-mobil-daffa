<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    
    protected $fillable = [
        'customer_id',
        'product_id',
        'total_price',
        'transaction_date'
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
