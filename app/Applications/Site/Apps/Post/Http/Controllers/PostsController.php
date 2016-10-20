<?php

namespace App\Applications\Site\Apps\Post\Http\Controllers;

use App\Domains\Posts\Repositories\RepositoryInterface as PostRepository;

/**
 * Posts Controller.
 */
class PostsController extends BaseController
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();

        return $this->view('posts.index', compact('posts'));
    }
}
