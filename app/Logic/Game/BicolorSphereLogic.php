<?php

namespace App\Logic\Game;

use App\Logic\BaseLogic;
use App\Models\BicolorSphere;
use Illuminate\Database\Eloquent\Builder;

class BicolorSphereLogic extends BaseLogic
{
    /**
     * @var Builder
     */
    protected $model;

    public function __construct()
    {
        $this->model = new BicolorSphere();
    }

    public function setData(array $data)
    {
        return $this->model->create($data);
    }

    public function findLast()
    {
        return $this->model->orderByDesc('id')->first();
    }

    public function updateByWhere(array $where, array $data)
    {
        return $this->model->where($where)->update($data);
    }

    public function getByWhere(array $where)
    {
        return $this->model->where($where)->get();
    }
}
