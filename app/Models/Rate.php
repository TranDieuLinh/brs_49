<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:27 AM
 */

namespace App\Models;


class Rate extends BaseModel
{
    protected $table = 'rates';

    protected $fillable = [
        'user_id',
        'point',
        'type',
        'type_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A comment belongs to review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    /**
     * A comment belongs to book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function scopeFindBookRate($query, $book_id, $user_id)
    {
        return $query->where(['type_id' => $book_id, 'user_id' => $user_id, 'type' => 1]);
    }

    public function scopeLatestRate($query, $user_id, $limit_size)
    {
        return $query->join('books', 'books.id', '=', 'rates.type_id')
            ->select(['title', 'books.id as book_id', 'point', 'rates.user_id as user_id', 'rates.created_at as created_at'])
            ->where(['rates.user_id' => $user_id])->orderBy('created_at', 'desc')->limit($limit_size);
    }

}
