<?php

namespace App\Admin\Controllers;

use App\Logic\Game\SsqHistoryLogic;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;

class SsqCountController extends AdminController
{
    public function index(Content $content)
    {
        $res = $this->ssqCount();
        $red_arr = $res['red'];
        $blue_arr = $res['blue'];
        return $content
            ->header('开奖号码统计')
            ->description('每个号码出现的次数')
            ->body(new Card('出现次数最少的四注', $this->minFiveCount()))
            ->body(new Card('出现次数最少的一注', $this->minCount()))
            ->body(function (Row $row) use ($red_arr) {
                $row->column(12, function (Column $column) use ($red_arr) {
                    $column->row(function (Row $row) use ($red_arr) {
                        $row->column(2, new Card("<sapn style='color: red'>红球1</sapn>: " . $red_arr['01']));
                        $row->column(2, new Card("<sapn style='color: red'>红球2</sapn>: " . $red_arr['02']));
                        $row->column(2, new Card("<sapn style='color: red'>红球3</sapn>: " . $red_arr['03']));
                        $row->column(2, new Card("<sapn style='color: red'>红球4</sapn>: " . $red_arr['04']));
                        $row->column(2, new Card("<sapn style='color: red'>红球5</sapn>: " . $red_arr['05']));
                        $row->column(2, new Card("<sapn style='color: red'>红球6</sapn>: " . $red_arr['06']));
                    });
                    $column->row(function (Row $row) use ($red_arr) {
                        $row->column(2, new Card("<sapn style='color: red'>红球7</sapn>: " . $red_arr['07']));
                        $row->column(2, new Card("<sapn style='color: red'>红球8</sapn>: " . $red_arr['08']));
                        $row->column(2, new Card("<sapn style='color: red'>红球9</sapn>: " . $red_arr['09']));
                        $row->column(2, new Card("<sapn style='color: red'>红球10</sapn>: " . $red_arr['10']));
                        $row->column(2, new Card("<sapn style='color: red'>红球11</sapn>: " . $red_arr['11']));
                        $row->column(2, new Card("<sapn style='color: red'>红球12</sapn>: " . $red_arr['12']));
                    });
                    $column->row(function (Row $row) use ($red_arr) {
                        $row->column(2, new Card("<sapn style='color: red'>红球13</sapn>: " . $red_arr['13']));
                        $row->column(2, new Card("<sapn style='color: red'>红球14</sapn>: " . $red_arr['14']));
                        $row->column(2, new Card("<sapn style='color: red'>红球15</sapn>: " . $red_arr['15']));
                        $row->column(2, new Card("<sapn style='color: red'>红球16</sapn>: " . $red_arr['16']));
                        $row->column(2, new Card("<sapn style='color: red'>红球17</sapn>: " . $red_arr['17']));
                        $row->column(2, new Card("<sapn style='color: red'>红球18</sapn>: " . $red_arr['18']));
                    });
                    $column->row(function (Row $row) use ($red_arr) {
                        $row->column(2, new Card("<sapn style='color: red'>红球19</sapn>: " . $red_arr['19']));
                        $row->column(2, new Card("<sapn style='color: red'>红球20</sapn>: " . $red_arr['20']));
                        $row->column(2, new Card("<sapn style='color: red'>红球21</sapn>: " . $red_arr['21']));
                        $row->column(2, new Card("<sapn style='color: red'>红球22</sapn>: " . $red_arr['22']));
                        $row->column(2, new Card("<sapn style='color: red'>红球23</sapn>: " . $red_arr['23']));
                        $row->column(2, new Card("<sapn style='color: red'>红球24</sapn>: " . $red_arr['24']));
                    }); $column->row(function (Row $row) use ($red_arr) {
                        $row->column(2, new Card("<sapn style='color: red'>红球25</sapn>: " . $red_arr['25']));
                        $row->column(2, new Card("<sapn style='color: red'>红球26</sapn>: " . $red_arr['26']));
                        $row->column(2, new Card("<sapn style='color: red'>红球27</sapn>: " . $red_arr['27']));
                        $row->column(2, new Card("<sapn style='color: red'>红球28</sapn>: " . $red_arr['28']));
                        $row->column(2, new Card("<sapn style='color: red'>红球29</sapn>: " . $red_arr['29']));
                        $row->column(2, new Card("<sapn style='color: red'>红球30</sapn>: " . $red_arr['30']));
                    });
                    $column->row(function (Row $row) use ($red_arr) {
                        $row->column(2, new Card("<sapn style='color: red'>红球31</sapn>: " . $red_arr['31']));
                        $row->column(2, new Card("<sapn style='color: red'>红球32</sapn>: " . $red_arr['32']));
                        $row->column(2, new Card("<sapn style='color: red'>红球33</sapn>: " . $red_arr['33']));
                    });

                });
            })->body(function (Row $row) use ($blue_arr) {
                $row->column(12, function (Column $column) use ($blue_arr) {
                    $column->row(function (Row $row) use ($blue_arr) {
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球1</sapn>: " . $blue_arr['01']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球2</sapn>: " . $blue_arr['02']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球3</sapn>: " . $blue_arr['03']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球4</sapn>: " . $blue_arr['04']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球5</sapn>: " . $blue_arr['05']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球6</sapn>: " . $blue_arr['06']));
                    });
                    $column->row(function (Row $row) use ($blue_arr) {
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球7</sapn>: " . $blue_arr['07']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球8</sapn>: " . $blue_arr['08']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球9</sapn>: " . $blue_arr['09']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球10</sapn>: " . $blue_arr['10']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球11</sapn>: " . $blue_arr['11']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球12</sapn>: " . $blue_arr['12']));
                    });
                    $column->row(function (Row $row) use ($blue_arr) {
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球13</sapn>: " . $blue_arr['13']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球14</sapn>: " . $blue_arr['14']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球15</sapn>: " . $blue_arr['15']));
                        $row->column(2, new Card("<sapn style='color: blue'>蓝球16</sapn>: " . $blue_arr['16']));
                    });
                });
            });
    }

    public function ssqCount()
    {
        $arr = [
            'red' => [],
            'blue' => []
        ];
        for($i = 1; $i <= 33; $i++) {
            if ($i < 10) {
                $i = 0 . $i;
            }
            $arr['red'][$i] = 0;
            if ($i <= 16) {
                $arr['blue'][$i] = 0;
            }
        }
        (new SsqHistoryLogic())->getByWhere([])->each(function ($v) use (&$arr) {
            $res_arr = explode('+', $v->open_code);
            $arr['blue'][$res_arr[1]]++;
            $red_arr = explode(',', $res_arr[0]);
            foreach ($red_arr as $item) {
                $arr['red'][$item]++;
            }
        });
        return $arr;
    }

    // 出现次数最小的一注
    public function minCount()
    {
        $res = $this->ssqCount();
        $red_arr = $res['red'];
        $blue_arr = $res['blue'];
        asort($red_arr);
        asort($blue_arr);

        $num = 0;

        $a = [];
        foreach ($red_arr as $k => $v) {
            if ($num >= 6) {
                break;
            }
            $a[] = $k;

            $num++;
        }
        sort($a);
        $str = '';
        foreach ($a as $v) {
            $str .= "<sapn style='color: red'>$v</sapn> ";
        }

        $res_blue = key($blue_arr);
        $str .= "<sapn style='color: blue'>$res_blue</sapn>";
        return $str;
    }

    // 出现次数最小的五注
    public function minFiveCount()
    {
        $res = $this->ssqCount();
        $red_arr = $res['red'];
        $blue_arr = $res['blue'];
        asort($red_arr);
        asort($blue_arr);

        $num = 0;
        $a = [];
        foreach ($red_arr as $k => $v) {
            if ($num >= 24) {
                break;
            }
            $a[] = $k;

            $num++;
        }

        $num = 0;
        $b = [];
        foreach ($blue_arr as $k => $v) {
            if ($num >= 4) {
                break;
            }
            $b[] = $k;

            $num++;
        }
        // 随机打乱数组
        shuffle($a);
        shuffle($b);
        // var_dump($b);

        $a = array_chunk($a, 6, false);

        $str = '';
        foreach ($a as $v) {
            sort($v);
            $red_str = implode(' ', $v);
            $str .= "<sapn style='color: red'>$red_str</sapn> ";
            $res_blue = $b[(count($b) - 1)];
            $str .= "<sapn style='color: blue'>$res_blue</sapn>" . "---";
            unset($b[(count($b) - 1)]);
        }

        return $str;
    }
}
