<?php

namespace App\Services;

use App\Abstracts\AbstractCrudService;
use App\Models\Human;

class HumanService extends AbstractCrudService
{

    public function create(array $data): void
    {
       Human::create($data);
    }

    public function update($model, array $data): void
    {
        $model->update($data);
    }

    public function delete($model): void
    {
        $model->delete($model);
    }
}
