<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class PostService
{
    /**
     * @var $postRepository
     */
    protected $postRepository;

    /**
     * PostService constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Delete post by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $post = $this->postRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete post data');
        }

        DB::commit();

        return $post;

    }

    /**
     * Get all post.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->postRepository->getAll();
    }


}
