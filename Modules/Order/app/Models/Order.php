<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Order\Database\factories\OrderFactory;
use Modules\User\app\Models\User;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'discount',
        'discount_code',
        'status',
        'transaction_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails(): HasMany
    {
       return $this->hasMany(OrderDetail::class);
    }

    protected static function newFactory(): OrderFactory
    {
        //return OrderFactory::new();
    }
}
