<?php

namespace Modules\Order\app\Helpers;


use Modules\Order\Models\Order;

class OrderCodeGenerator
{

    public static function generateRandomInteger($length)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomInteger = '';
        for ($i = 0; $i < $length; $i++) {
            $randomInteger .= $characters[rand(0, $charactersLength - 1)];
        }
        $codeExist = Order::query()->where('order_code', $randomInteger)->first();
        if ($codeExist) {
            return self::generateRandomInteger(6);
        }

        return $randomInteger;
    }

}
