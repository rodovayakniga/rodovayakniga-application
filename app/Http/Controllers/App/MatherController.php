<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\CrudBaseController;
use App\Models\Mather;

class MatherController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(Mather::class);
    }
}
