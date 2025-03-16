<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DTOs\BaseDTO;

abstract class BaseRepository implements RepositoryInterface
{
    protected Model $model;

    protected string $modelName;

    public function __construct()
    {
        $this->model = resolve($this->modelName);
    }

    public function getAll(int $page = 1, int $limit = 10): LengthAwarePaginator
    {
        return $this->model->paginate($limit, ['*'], 'page', $page);
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(BaseDTO $data): Model
    {
        return $this->model->create($data->toArray());
    }

    /**
     * @param int $id
     * @param BaseDTO $data
     * @return Model
     */
    public function update(int $id, BaseDTO $data): Model
    {
        $model = $this->model->findOrFail($id);

        $model->update($data->toArray());

        return $model->refresh();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $model = $this->model->findOrFail($id);

        $model->delete();
    }
}
