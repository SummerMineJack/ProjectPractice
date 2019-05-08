<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/8
 * Time: 10:12
 */

class findMaxValues
{
    public function findMax($arrays = array(), $firstValues)
    {
        foreach ($arrays as $num) {
            if ($firstValues < $num) {
                $firstValues = $num;
            }
        }
        return $firstValues;
    }
}