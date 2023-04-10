<?php

namespace App\Commons;

class Helper
{
    /**
     * @param int $max 最大随机数
     * @param int $min 最小随机数
     * @param string $amount 随机数个数
     * @return array
     */
    public static function randomArr(int $max, int $min = 0, string $amount = ""): array
    {
        $range = $max - $min;

        if ($amount == null) {
            $amount = $range; // 设定$range默认值
        }

        if ($min >= $max || $amount > $range) {
            return [];
        } else {
            $arr = [];
            for ($i = 0; $i < $range; $i++) {
                $arr[$i] = $i + $min; // 生成固定范围的顺序数
            }
            for ($j = 0; $j < (2 * $max); $j++) {
                $offset1 = mt_rand(0, $range - 1); // 生成固定范围的随机数组下标1
                $offset2 = mt_rand(0, $range - 1); // 生成固定范围的随机数组下标2

                // 将上述两个随机生成的下标为索引交换两个元素，将整个数组乱序
                $temp = $arr[$offset1];
                $arr[$offset1] = $arr[$offset2];
                $arr[$offset2] = $temp;
            }
            if ($range != $amount) {
                // 从后面开始删除多余的数组
                for ($m = 0; $m < $range - $amount; $m++) {
                    $sumKey = count($arr) - 1;
                    unset($arr[$sumKey]);
                }
            }
            sort($arr);
            return $arr;
        }
    }
}
