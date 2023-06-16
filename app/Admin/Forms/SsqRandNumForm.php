<?php

namespace App\Admin\Forms;

use App\Commons\Helper;
use App\Logic\Game\BicolorSphereLogic;
use Dcat\Admin\Widgets\Form;

class SsqRandNumForm extends Form
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
        for ($i = 0; $i < $input['num']; $i++) {
            // 生成6个红球随机数
            $red_arr = Helper::randomArr2($input['red'], 6);
            // 生成1个蓝球随机数
            $blue = Helper::randomArr2($input['blue'], 1);

            $w = date('w');
            $date1 = match (true) {
                $w == 1 || $w == 3 || $w == 6 => date('Y-m-d', strtotime('+1 day')),
                $w == 5 => date('Y-m-d', strtotime('+2 day')),
                default => date('Y-m-d'),
            };

            // 数据入库
            $model->setData([
                'date' => $date1,
                'num' => isset($res['num']) ? $res['num'] + 1 : 0,
                'red1' => $red_arr[0],
                'red2' => $red_arr[1],
                'red3' => $red_arr[2],
                'red4' => $red_arr[3],
                'red5' => $red_arr[4],
                'red6' => $red_arr[5],
                'blue' => $blue,
                'lottery_number' => '',
            ]);
        }

        return $this->response()
            ->success('Processed successfully.')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->checkbox('red', '红球')->options($this->numFor(1, 33));
        $this->checkbox('blue')->options($this->numFor(1, 16));
        $this->number('num', '注数')->default(5);
    }

    public function numFor(int $start, int $end)
    {
        $arr = [];
        for ($i = $start; $i <= $end; $i++) {
            $num = $i;
            if ($num < 10) {
                $num = '0' . $i;
            }
            $arr[$i] = $num;
        }
        return $arr;
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
