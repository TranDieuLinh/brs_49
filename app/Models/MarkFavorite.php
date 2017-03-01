<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:22 AM
 */

namespace App\Models;


class MarkFavorite extends BaseModel
{
    protected $table = 'mark_favorites';
    protected $fillable = [
        'user_id',
        'book_id'
    ];

    public function scopeLatestFavorites($query, $user_id, $limit_size)
    {
        return $query->join('books', 'books.id', '=', 'mark_favorites.book_id')
            ->select(['title', 'book_id', 'mark_favorites.user_id as user_id', 'mark_favorites.created_at as created_at'])
            ->where(['mark_favorites.user_id' => $user_id])->orderBy('created_at', 'desc')->limit($limit_size);
    }
}
