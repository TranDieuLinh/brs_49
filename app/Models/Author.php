<?php

/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:17 AM
 */
namespace App\Models;

class Author extends BaseModel
{
    protected $table = "authors";
    protected $fillable = [
        'name',
    ];

    /**
     * Get all book from author's books
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
