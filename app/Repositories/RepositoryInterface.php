<?php

namespace App\Repositories;

use App\DTOs\BaseDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    /**
     * @param int $page
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public function getAll(int $page = 1, int $limit = 10): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): ?Model;

    /**
     * @param BaseDTO $data
     */
    public function create(BaseDTO $data): Model;

    public function update(int $id, BaseDTO $data): Model;

    public function delete(int $id): void;
}
