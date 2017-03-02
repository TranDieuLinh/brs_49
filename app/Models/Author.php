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
    protected $table = 'authors';
    protected $fillable = [
        'author_name',
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

    public function scopeFindExcellentAuthor($query){
        $authors = Author::all();
        $author = [];
        foreach ($authors as $au)
        {
            if (count($au->books) > 2)
            {
                array_push($author, $au);
            }
        }
        return $author;
    }

    public function scopeFindByName($query, $name)
    {
        return $query->where(['author_name' => $name]);
    }
}
