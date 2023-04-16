<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\SsqHistory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SsqHistoryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new SsqHistory(), function (Grid $grid) {
            $grid->disableActions();
            $grid->disableCreateButton();
            $grid->disableRowSelector();
            $grid->disableRefreshButton();
            $grid->disableFilterButton();
            $grid->withBorder();
            // $grid->addTableClass(['table-text-center']);
            $grid->number();
            $grid->paginate(10);

            $grid->model()->orderByDesc('id');

            // $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('expect');
            $grid->column('open_code');
            $grid->column('code');
            $grid->column('time');
            // $grid->column('created_at');
            // $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->expand();
                $filter->equal('code')->width(2);
                $filter->equal('expect')->width(2);

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
        return Show::make($id, new SsqHistory(), function (Show $show) {
            $show->field('id');
            $show->field('open_code');
            $show->field('code');
            $show->field('expect');
            $show->field('time');
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
        return Form::make(new SsqHistory(), function (Form $form) {
            $form->display('id');
            $form->text('open_code');
            $form->text('code');
            $form->text('expect');
            $form->text('time');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
