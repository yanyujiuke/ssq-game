<?php

namespace App\Admin\Repositories;

use App\Models\SsqHistory as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class SsqHistory extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
