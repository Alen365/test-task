<?php

namespace App\Services\Library;

use App\DTOs\Library\BookDTO;
use App\Models\Book;
use App\Repositories\Library\BookRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BookService
{
    public function __construct(private readonly BookRepository $repository)
    {
    }

    public function getAllBooks($page, $limit): LengthAwarePaginator
    {
        return $this->repository->getAll();
    }

    public function filterBooks(array $filters, int $page, int $limit): LengthAwarePaginator|null
    {
        return $this->repository->filter($filters, $page, $limit);
    }

    public function getBookById(int $id): \App\Models\Author|\Illuminate\Database\Eloquent\Model
    {
        return $this->repository->getById($id);
    }

    public function createBook(BookDTO $data): Model
    {
        return $this->repository->create($data);
    }

    public function updateBook(int $id, BookDTO $data): Model
    {
        return $this->repository->update($id, $data);
    }

    public function deleteBook(int $bookId): void
    {
        $this->repository->delete($bookId);
    }
}
