<?php

namespace Modules\Transaction\app\Enums;

enum TransactionType:string
{
  case Pay = 'pay';
  case Receive = 'receive';

}
