<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:23 AM
 */

namespace App\Models;


class MarkRead extends BaseModel
{
    protected $table = 'mark_reads';

    protected $fillable = [
        'user_id',
        'book_id',
        'is_completed',
    ];

    public function scopeLatestMarkRead($query, $user_id, $limit_size)
    {
        return $query->join('books', 'books.id', '=', 'mark_reads.book_id')
            ->select(['title', 'book_id', 'is_completed', 'mark_reads.user_id as user_id', 'mark_reads.created_at as created_at'])
            ->where(['mark_reads.user_id' => $user_id])->orderBy('created_at', 'desc')->limit($limit_size);
    }
}
