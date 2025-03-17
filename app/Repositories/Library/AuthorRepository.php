<?php

namespace App\Repositories\Library;

use App\Models\Author;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AuthorRepository extends BaseRepository implements RepositoryInterface
{
    protected string $modelName = Author::class;

    /**
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): ?Model
    {
        return $this->model->with('books')->findOrFail($id);
    }
}
