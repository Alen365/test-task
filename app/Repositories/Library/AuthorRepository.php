<?php

namespace App\Repositories\Library;

use App\Models\Author;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;

class AuthorRepository extends BaseRepository implements RepositoryInterface
{
    protected string $modelName = Author::class;
}
