<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:25 AM
 */

namespace App\Models;


class Request extends BaseModel
{
    protected $table = 'requests';
    protected $fillable = [
        'user_id',
        'book_name',
        'description',
        'author_name',
        'date_published',
        'status',
    ];

    /**
     * Get user requested books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
