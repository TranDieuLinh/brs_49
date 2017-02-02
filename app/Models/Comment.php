<?php
/**
 * Created by PhpStorm.
 * User: VS9 X64Bit
 * Date: 24/01/2017
 * Time: 9:20 AM
 */

namespace App\Models;

class Comment extends BaseModel
{
    protected $table = "comments";
    protected $fillable = [
        'content',
        'user_id',
        'review_id',
    ];

    /**
     * A comment belongs to review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function review()
    {
        return $this->belongsTo(Review::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
