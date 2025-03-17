<?php

namespace App\Services\Library;

use App\DTOs\Library\AuthorDTO;
use App\Models\Author;
use App\Repositories\Library\AuthorRepository;
use App\Repositories\Library\BookRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorService
{
    public function __construct(private readonly AuthorRepository $repository)
    {
    }

    public function getAuthors(): LengthAwarePaginator
    {
        return $this->repository->getAll();
    }

    public function getAuthorById(int $id): Author|null
    {
        return $this->repository->getById($id);
    }

    public function createAuthor(AuthorDTO $data): Model
    {
        return $this->repository->create($data);
    }

    public function updateAuthor(int $id, AuthorDTO $data): Model
    {
        return $this->repository->update($id, $data);
    }

    public function deleteAuthor($authorId): void
    {
        $this->repository->delete($authorId);
    }
}
