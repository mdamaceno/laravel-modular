<?php

namespace App\Domains\Posts\Repositories;

interface RepositoryInterface
{
    public function getAll($columns);
}
