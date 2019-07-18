<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/18
 * Time: 14:54
 */

namespace app\common\controller;
class User
{

    public function getUserName($userName)
    {
        return "welcome, {$userName}";
    }
}