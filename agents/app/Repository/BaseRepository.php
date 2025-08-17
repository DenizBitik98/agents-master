<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{

    protected $model;
    public function __construct(Model $model)
    {
        return $this->model = $model;
    }

    public function query(): Builder
    {
        return $this->model::query();
    }

    public function all()
    {
        return $this->query()->get();
    }

    public function find($id): ?Model
    {
        return $this->query()->find($id) ?: null;
    }

    public function create($attribute): Model
    {
        return $this->query()->firstOrCreate($attribute);
    }

    public function update($id,$params): Model
    {
        $data = $this->query()->where('id', $id)->first();
        $data->update($params);
        return $data;
    }

    public function delete($id): ?bool
    {
        return $this->query()->where('id', $id)->delete();
    }

}
