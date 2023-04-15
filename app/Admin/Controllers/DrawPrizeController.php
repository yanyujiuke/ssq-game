<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\DrawPrize;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class DrawPrizeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new DrawPrize(), function (Grid $grid) {
            $grid->disableActions();
            $grid->disableCreateButton();
            $grid->disableRowSelector();
            $grid->disableFilterButton();
            $grid->disablePagination();
            $grid->disableRefreshButton();
            $grid->withBorder();
            // $grid->addTableClass(['table-text-center']);
            $grid->number();

            // $grid->column('id')->sortable();
            // $grid->column('code');
            $grid->column('awards');
            $grid->column('condition')->display(function ($v) {
                $id = $this->id;
                $str = '';
                if ($id < 4) {
                    for ($i = 0; $i < strlen($v); $i++) {
                        if ($v[$i] == 'r') {
                            $str .= '<div style="width:20px;height:20px;border-radius:50%;background-color:red;float:left"></div>';
                        }
                        if ($v[$i] == 'b') {
                            $str .= '<div style="width:20px;height:20px;border-radius:50%;background-color:blue;float:left"></div>';
                        }
                    }
                } else {
                    $arr = explode(',', $v);
                    foreach ($arr as $item) {
                        $str .= '<div style="float:left;clear: both;margin-bottom: 10px">';
                        for ($i = 0; $i < strlen($item); $i++) {
                            if ($item[$i] == 'r') {
                                $str .= '<div style="width:20px;height:20px;border-radius:50%;background-color:red;float:left"></div>';
                            }
                            if ($item[$i] == 'b') {
                                $str .= '<div style="width:20px;height:20px;border-radius:50%;background-color:blue;float:left"></div>';
                            }
                        }
                        $str .= '</div>';
                    }
                }

                return $str;
            });
            $grid->column('desc')->label('skyblue');
            $grid->column('bonus');
            // $grid->column('remark');
            // $grid->column('created_at');
            // $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new DrawPrize(), function (Show $show) {
            $show->field('id');
            $show->field('code');
            $show->field('awards');
            $show->field('condition');
            $show->field('desc');
            $show->field('bonus');
            $show->field('remark');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new DrawPrize(), function (Form $form) {
            $form->display('id');
            $form->text('code');
            $form->text('awards');
            $form->text('condition');
            $form->text('desc');
            $form->text('bonus');
            $form->text('remark');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
