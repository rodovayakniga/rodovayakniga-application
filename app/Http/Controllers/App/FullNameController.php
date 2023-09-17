<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\CrudBaseController;
use App\Http\Requests\FullNameRequest;
use App\Models\FullName;

class FullNameController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(
            FullName::class,
            FullNameRequest::class
        );
    }
}
