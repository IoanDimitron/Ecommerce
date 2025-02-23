<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;   
 use Illuminate\Database\Eloquent\Casts\Attribute;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'payment_method', 'payment_status', 'status', 'currency', 'shipping_method'];

    public function grandTotal(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->items->sum(fn ($item) => $item->total_amount);
            }
        );
    }



    public function user() {
        return $this -> belongsTo(User::class);
    }
    public function items() {
        return $this -> hasMany(OrderItem::class);
    }
    public function address() {
        return $this -> hasOne(Address::class);
    }
}
