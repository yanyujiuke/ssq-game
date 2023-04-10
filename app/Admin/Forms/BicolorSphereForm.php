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
