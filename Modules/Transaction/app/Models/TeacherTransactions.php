<?php

namespace Modules\Transaction\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Transaction\Database\factories\TeacherTransactionsFactory;
use Modules\User\app\Models\User;

class TeacherTransactions extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'amount',
        'description',
        'transaction_type'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory(): TeacherTransactionsFactory
    {
        //return TeacherTransactionsFactory::new();
    }
}
