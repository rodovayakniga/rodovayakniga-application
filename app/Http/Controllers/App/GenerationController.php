<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\CrudBaseController;
use App\Http\Requests\GenerationRequest;
use App\Models\Generation;

class GenerationController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(
            Generation::class,
            GenerationRequest::class,
        );
    }
}
