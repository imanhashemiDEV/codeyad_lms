<?php

namespace Modules\Order\app\Enums;

enum OrderStatus:string
{
  case Draft = 'draft';
  case Successful = 'successful';
  case Failed = 'failed';
}
