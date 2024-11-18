<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Database\factories\CategoryFactory;
use Modules\Course\Models\Course;

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

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(self::class, 'parent_id','id')
          ->withDefault(['title'=>'-------']);
    }

    public function child(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(self::class,'parent_id','id');
    }

    public function courses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Course::class);
    }

    protected static function boot(): void
    {
        parent::boot();
        self::deleting(static function ($category) {
            foreach($category->child()->get() as $child){
                $child->update([
                    'parent_id' => 0
                ]);
            }
        });
    }

}
