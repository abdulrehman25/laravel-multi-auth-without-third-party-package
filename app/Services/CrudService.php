<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Bool_;

class CrudService
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model::all();
    }

    public function create($data): Model
    {
        return $this->model::create($data);
    }

    public function find($id): Model
    {
        return $this->model::find($id);
    }

    public function update($id, $data): Model | Bool
    {
        $record = $this->model::find($id);
        if (!$record) {
            return false;
        }

        return $record->update($data);
    }

    public function delete($id): Bool
    {
        $record = $this->model::find($id);
        if (!$record) {
            return false;
        }

        return $record->delete();
    }
}
