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

    public function scopeGetComments($query, $user_id, $limit_size)
    {
        return $query->select(['review_id', 'content', 'created_at'])
            ->where(['user_id' => $user_id])->orderBy('created_at', 'desc')
            ->limit($limit_size);
    }
}
