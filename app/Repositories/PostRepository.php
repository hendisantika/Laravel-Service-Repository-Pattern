<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * PostRepository constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

}
