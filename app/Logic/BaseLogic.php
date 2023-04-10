<?php

namespace App\Logic;

use Illuminate\Database\Eloquent\Builder;

class BaseLogic
{
    /**
     * @var Builder
     */
    protected $model;

    public static function make(): BaseLogic
    {
        return new self;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setData(array $data)
    {
        return $this->model->create($data);
    }
}
