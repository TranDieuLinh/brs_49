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
    protected $table = 'favorite_books';
    protected $fillable = [
        'user_id',
        'book_id'
    ];
}
