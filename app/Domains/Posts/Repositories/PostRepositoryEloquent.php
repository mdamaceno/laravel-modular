<?php

namespace App\Domains\Posts\Repositories;

use App\Domains\Posts\Post;

/**
 * Post Repository.
 */
class PostRepositoryEloquent implements RepositoryInterface
{
    private $postModel;

    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function getAll($columns = '*')
    {
        // return $this->postModel->select($columns)->get();
        return [
          [
            'title' => 'A história dos três porquinhos',
            'body' => 'Era uma vez...',
          ],
          [
            'title' => 'Branca de Neve e os 7 Anões',
            'body' => 'Era uma vez...',
          ],
          [
            'title' => 'Chapeuzinho Vermelho',
            'body' => 'Era uma vez...',
          ],
        ];
    }
}
