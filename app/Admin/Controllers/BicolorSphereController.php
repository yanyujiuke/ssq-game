<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\BicolorSphere;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class BicolorSphereController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new BicolorSphere(), function (Grid $grid) {
            $grid->tableCollapse(false);
            $grid->disableActions();
            $grid->disableRowSelector();
            $grid->paginate(5);
            $grid->disableCreateButton();

            $grid->tools([new \App\Admin\Actions\Grid\BicolorSphere()]);

            $grid->model()->orderByDesc('date');

            // $grid->column('id')->sortable();
            $grid->column('date');
            $grid->column('num');
            $grid->column('red1')->display(function ($v) {
                if ($v < 10) {
                    $v = '0' . $v;
                }
                $arr = explode(' ', $this->lottery_number);
                unset($arr[count($arr) -1]);
                if (in_array($v, $arr)) {
                    return "<span style='background: red;'>$v</span>";
                }
                return "<span style='color: red'>$v</span>";
            });
            $grid->column('red2')->display(function ($v) {
                if ($v < 10) {
                    $v = '0' . $v;
                }
                $arr = explode(' ', $this->lottery_number);
                unset($arr[count($arr) -1]);
                if (in_array($v, $arr)) {
                    return "<span style='background: red;'>$v</span>";
                }
                return "<span style='color: red'>$v</span>";
            });;
            $grid->column('red3')->display(function ($v) {
                if ($v < 10) {
                    $v = '0' . $v;
                }
                $arr = explode(' ', $this->lottery_number);
                unset($arr[count($arr) -1]);
                if (in_array($v, $arr)) {
                    return "<span style='background: red;'>$v</span>";
                }
                return "<span style='color: red'>$v</span>";
            });;
            $grid->column('red4')->display(function ($v) {
                if ($v < 10) {
                    $v = '0' . $v;
                }
                $arr = explode(' ', $this->lottery_number);
                unset($arr[count($arr) -1]);
                if (in_array($v, $arr)) {
                    return "<span style='background: red;'>$v</span>";
                }
                return "<span style='color: red'>$v</span>";
            });;
            $grid->column('red5')->display(function ($v) {
                if ($v < 10) {
                    $v = '0' . $v;
                }
                $arr = explode(' ', $this->lottery_number);
                unset($arr[count($arr) -1]);
                if (in_array($v, $arr)) {
                    return "<span style='background: red;'>$v</span>";
                }
                return "<span style='color: red'>$v</span>";
            });;
            $grid->column('red6')->display(function ($v) {
                if ($v < 10) {
                    $v = '0' . $v;
                }
                $arr = explode(' ', $this->lottery_number);
                unset($arr[count($arr) -1]);
                if (in_array($v, $arr)) {
                    return "<span style='background: red;'>$v</span>";
                }
                return "<span style='color: red'>$v</span>";
            });;
            $grid->column('blue')->display(function ($v) {
                if ($v < 10) {
                    $v = '0' . $v;
                }
                $arr = explode(' ', $this->lottery_number);
                if ($v == $arr[count($arr) -1]) {
                    return "<span style='background: skyblue;'>$v</span>";
                }
                return "<span style='color: blue'>$v</span>";
            });;
            $grid->column('lottery_number')->display(function ($v) {
                $arr = explode(' ', $v);
                $str = '';
                for ($i = 0; $i < count($arr) - 2; $i++) {
                    $str .= "<span style='color: red;'>$arr[$i]</span>" . ' ';
                }
                $index = count($arr) - 1;
                $str .= "<span style='color: blue;'>$arr[$index]</span>";
                return $str;
            });
            // $grid->column('created_at');
            // $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->date('date')->width(2);
                $filter->equal('num')->width(2);
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
        return Show::make($id, new BicolorSphere(), function (Show $show) {
            $show->field('id');
            $show->field('date');
            $show->field('num');
            $show->field('red1');
            $show->field('red2');
            $show->field('red3');
            $show->field('red4');
            $show->field('red5');
            $show->field('red6');
            $show->field('blue');
            $show->field('lottery_number');
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
        return Form::make(new BicolorSphere(), function (Form $form) {
            $form->display('id');
            $form->text('date');
            $form->text('num');
            $form->text('red1');
            $form->text('red2');
            $form->text('red3');
            $form->text('red4');
            $form->text('red5');
            $form->text('red6');
            $form->text('blue');
            $form->text('lottery_number');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
