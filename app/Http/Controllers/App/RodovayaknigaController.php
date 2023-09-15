<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\CrudBaseController;
use App\Http\Requests\RodovayaknigaRequest;
use App\Models\Rodovayakniga;

class RodovayaknigaController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(
            Rodovayakniga::class,
               RodovayaknigaRequest::class
        );
    }
}
