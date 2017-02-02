<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:19 AM
 */

namespace App\Models;

class Category extends BaseModel
{
    protected $table = "categories";
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * A category have many books
     *
     * \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
