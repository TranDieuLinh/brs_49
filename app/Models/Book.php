<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:25 AM
 */

namespace App\Models;

class Book extends BaseModel
{
    protected $table = "books";
    protected $fillable = [
        'author_id',
        'description',
        'title',
        'category_id',
        'number_of_page',
        'date_published',
        'publisher',
        'image',
        'rate',
        'rate_count',
        'price',
    ];

    /**
     * Define a book to many user favorited books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class, MarkFavorite::getTableName())
            ->withTimestamps();
    }

    /**
     * Define a book to many user read books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function readingUsers()
    {
        return $this->belongsToMany(User::class, MarkRead::getTableName())
            ->withPivot('is_completed')
            ->withTimestamps();
    }

    /**
     * Define a book to many user reviewed with books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reviewUsers()
    {
        return $this->belongsToMany(User::class, Review::getTableName())
            ->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function scopeFindByCategory($query, $id)
    {
        return $query->join('authors', 'books.author_id', '=', 'authors.id')
            ->where('category_id', $id)->get();
    }

    public function scopeFindByAuthor($query, $id)
    {
        return $query->join('authors', 'books.author_id', '=', 'authors.id')
            ->where('author_id', $id)->get();
    }

    public function scopeFindLatest($query)
    {
        return $query->join('authors', 'books.author_id', '=', 'authors.id')
            ->orderBy('date_published', 'desc')->limit(15)->get();
    }

    public function scopeSearch($query, $search) {
        return $query->join('authors', 'books.author_id', '=', 'authors.id')
            ->where('authors.author_name', 'like', $search)
            ->orWhere('books.title', 'like', '%'.$search.'%')
            ->limit(20)->get();
    }
}
