<?php

namespace App\Http\Controllers\App;


use App\Http\Controllers\CrudBaseController;

class FatherController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(FatherController::class);
    }
}
