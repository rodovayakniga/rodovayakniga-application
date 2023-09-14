<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\CrudBaseController;
use App\Models\Human;

class HumanController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(Human::class);
    }
}
