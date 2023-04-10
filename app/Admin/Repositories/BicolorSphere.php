<?php

namespace App\Admin\Repositories;

use App\Models\BicolorSphere as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class BicolorSphere extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
