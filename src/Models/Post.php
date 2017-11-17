<?php

namespace Lifeids\Groups\Models;

use Eloquent;
use Lifeids\Groups\Traits\Likes;
use Lifeids\AbuseReportable\Traits\AbuseReportable as AbuseReportableTrait;

class Post extends Eloquent
{
    use Likes;
    use AbuseReportableTrait;

    protected $fillable = ['title', 'user_id', 'body', 'type', 'extra_info'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->with('commentator');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * Creates a post.
     *
     * @param array $data
     *
     * @return Post
     */
    public function make($data)
    {
        return $this->create($data);
    }

    /**
     * Updates Post.
     *
     * @param int   $postId
     * @param array $data
     *
     * @return Post
     */
    public function updatePost($postId, $data)
    {
        $this->where('id', $postId)->update($data);

        return $this;
    }
}
