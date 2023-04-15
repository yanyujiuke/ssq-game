<?php

namespace App\Admin\Forms;

use App\Logic\Game\BicolorSphereLogic;
use Dcat\Admin\Widgets\Form;

class BicolorSphereForm extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        $model = new BicolorSphereLogic();
        $str = $input['red1'] . ' ' . $input['red2'] . ' ' . $input['red3'] . ' ' . $input['red4'] . ' ' . $input['red5'] . ' ' . $input['red6'] . ' ' . $input['blue'];
        $model->updateByWhere(['date' => $input['date']], ['lottery_number' => $str]);

        // 判断是否中奖
        // 红球中奖数
        $red_num = 0;
        // 蓝球是否中奖
        $blue = false;
        $model->getByWhere(['date' => $input['date']])->each(function ($v) use ($input, $model) {
            // 红球中奖数
            $red_num = 0;
            // 蓝球是否中奖
            $blue = false;
            // 中奖等级
            $awards = 0;

            if ($input['red1'] == $v['red1']) {
                $red_num++;
            }
            if ($input['red2'] == $v['red2']) {
                $red_num++;
            }
            if ($input['red3'] == $v['red3']) {
                $red_num++;
            }
            if ($input['red4'] == $v['red4']) {
                $red_num++;
            }
            if ($input['red5'] == $v['red5']) {
                $red_num++;
            }
            if ($input['red6'] == $v['red6']) {
                $red_num++;
            }
            if ($input['blue'] == $v['blue']) {
                $blue = true;
            }

            if ($red_num == 6 && $blue) {
                $awards = 1;
            } elseif ($red_num == 6 && !$blue) {
                $awards = 2;
            } elseif ($red_num == 5 && $blue) {
                $awards = 3;
            } elseif (($red_num == 5 && !$blue) || ($red_num == 4 && $blue)) {
                $awards = 4;
            } elseif (($red_num == 4 && !$blue) || ($red_num == 3 && $blue)) {
                $awards = 5;
            } elseif (($red_num == 2 && $blue) || ($red_num == 1 && $blue) || (($red_num == 0 && $blue))) {
                $awards = 6;
            }

            $model->updateByWhere(['id' => $v['id']], ['awards' => $awards]);
        });

        return $this->response()
            ->success('Processed successfully.')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->date('date')->required();
        $this->text('red1');
        $this->text('red2');
        $this->text('red3');
        $this->text('red4');
        $this->text('red5');
        $this->text('red6');
        $this->text('blue');
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [
        ];
    }
}
