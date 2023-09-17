<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\CrudBaseController;
use App\Models\Birth;

class BirthController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(Birth::class);
    }
}
