<?php

namespace App\Admin\Actions\Grid;

use App\Admin\Forms\SsqRandNumForm;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class SsqRandNum extends RowAction
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
            ->body(new SsqRandNumForm())
            ->button($this->getTitle());
    }

    public function getTitle()
    {
        return '<button class="btn btn-primary grid-refresh btn-mini btn-outline"><i class="feather icon-edit"></i>&nbsp; 自选随机号码</button>';
    }
}
