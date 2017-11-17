<?php

namespace Lifeids\Groups\Models;

use Eloquent;
use Lifeids\Groups\Traits\Likes;
use Lifeids\AbuseReportable\Traits\AbuseReportable as AbuseReportableTrait;

class Comment extends Eloquent
{
    use Likes;
    use AbuseReportableTrait;

    protected $fillable = ['post_id', 'user_id', 'body'];

    public function commentator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }


    /**
     * Adds a comment.
     *
     * @param array $comment
     *
     * @return Comment
     */
    public function add($comment)
    {
        return $this->create($comment);
    }
}
