<?php

namespace App\Services;

use App\Abstracts\AbstractCrudService;
use App\Models\Rodovayakniga;

class RodovayaknigaService extends AbstractCrudService
{

    public function create(array $data): void
    {
        Rodovayakniga::create($data);
    }

    public function update($model, array $data): void
    {
        $model->update($data);
    }

    public function delete($model): void
    {
        $model->delete();
    }
}
