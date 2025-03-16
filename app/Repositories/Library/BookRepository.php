<?php

namespace App\Repositories\Library;

use App\Models\Book;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryFilterInterface;

class BookRepository extends BaseRepository implements RepositoryFilterInterface
{
    protected string $modelName = Book::class;

    public function filter(array $filters, int $page, int $limit)
    {
        return  $this->model
            ->when(isset($filters['author_id']), fn($q) => $q->where('author_id', $filters['author_id']))
            ->paginate($limit, ['*'], 'page', $page);
    }
}
