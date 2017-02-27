<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:24 AM
 */

namespace App\Models;


use Illuminate\Support\Facades\DB;

class Review extends BaseModel
{
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'book_id',
        'content',
        'rate',
        'rate_count',
    ];

    /**
     * Get a book that user reviewed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get a user that one has reviewed books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *  Get all comment belongs to Reivew
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function scopeDeleteById($query, $id)
    {
        $query->where('id', '=', $id)->get()->first()->comments()->delete();
        $query->where('id', '=', $id)->delete();
    }
}
