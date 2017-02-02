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
    protected $table = 'reading_books';

    protected $fillable = [
        'user_id',
        'book_id',
        'is_completed',
    ];
}
