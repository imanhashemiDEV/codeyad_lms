<?php

namespace Modules\Coupon\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Coupon\Database\factories\CouponFactory;

class Coupon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'coupon_code',
        'coupon_percent'
    ];

    protected static function newFactory()
    {
        //return CouponFactory::new();
    }
}
