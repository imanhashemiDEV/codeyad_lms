<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Database\factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'parent_id'
    ];

    public function parent()
    {
      return $this->belongsTo(self::class, 'parent_id','id')
          ->withDefault(['title'=>'-------']);
    }

    public function child()
    {
      return $this->hasMany(self::class,'parent_id','id');
    }

    protected static function newFactory(): CategoryFactory
    {
        //return CategoryFactory::new();
    }
}
