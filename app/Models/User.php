<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'birthday',
        'role',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Define a one-to-many relationship with Model\RequestBook
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requestBooks()
    {
        return $this->hasMany(Request::class);
    }

    /**
     * Define a user to many favorite books relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favoriteBooks()
    {
        return $this->belongsToMany(Book::class, MarkFavorite::getTableName())
            ->withTimestamps();
    }

    /**
     * Define a user to many reading books relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function readingBooks()
    {
        return $this->belongsToMany(Book::class, MarkRead::getTableName())
            ->withPivot('is_completed')
            ->withTimestamps();
    }

    /**
     * Define a user can many reviews from books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reviewBooks()
    {
        return $this->belongsToMany(Book::class, Review::getTableName())
            ->withTimestamps();
    }

    /**
     * Define a user to many reviews
     *
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
}
