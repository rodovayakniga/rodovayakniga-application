<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\CrudBaseController;
use App\Http\Requests\RelativesHumanRequest;
use App\Models\RelativesHuman;

class RelativesHumanController extends CrudBaseController
{
    public function __construct()
    {
        parent::__construct(
            RelativesHuman::class,
            RelativesHumanRequest::class
        );
    }
}
