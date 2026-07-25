<?php

namespace Celysium\Base\Service;

use Celysium\Base\Contracts\BaseRepositoryInterface;
use Celysium\Base\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BaseService implements BaseServiceInterface
{
    public function __construct(protected BaseRepositoryInterface $repository)
    {
    }

    public function index(array $parameters = [], array $columns = ['*']): Builder|Collection|LengthAwarePaginator|array
    {
        return $this->repository->index($parameters, $columns);
    }

    public function show(Model $model): Model
    {
        return $model;
    }

    public function store(array $parameters): Model
    {
        return $this->repository->store($parameters);
    }

    public function update(Model $model, array $parameters): Model
    {
        return $this->repository->update($model, $parameters);
    }

    public function destroy(Model $model): bool
    {
        return $this->repository->destroy($model);
    }
}
