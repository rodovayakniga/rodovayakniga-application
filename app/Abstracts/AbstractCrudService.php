<?php

namespace App\Abstracts;

abstract class AbstractCrudService
{
    public abstract function create(array $data);

    public abstract function update($model, array $data);

    public abstract function delete($model);

}
