<?php

namespace App\Admin\Actions\Grid;

use App\Admin\Forms\BicolorSphereForm;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class BicolorSphere extends RowAction
{
    /**
     * @return string
     */
	protected $title = 'Title';

    public function render()
    {
        return Modal::make()
            ->xl()
            ->title($this->title)
            ->body(new BicolorSphereForm())
            ->button($this->getTitle());
    }

    public function getTitle()
    {
        return '<button class="btn btn-primary grid-refresh btn-mini btn-outline"><i class="feather icon-edit"></i>&nbsp; 开奖号码</button>';
    }
}
