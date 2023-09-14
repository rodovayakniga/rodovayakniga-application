<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\CrudBaseController;
use App\Models\BrotherOrSister;

class BrotherOrSisterController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(BrotherOrSister::class);
    }
}
