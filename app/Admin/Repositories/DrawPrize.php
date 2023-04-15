<?php

namespace App\Admin\Repositories;

use App\Models\DrawPrize as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class DrawPrize extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
