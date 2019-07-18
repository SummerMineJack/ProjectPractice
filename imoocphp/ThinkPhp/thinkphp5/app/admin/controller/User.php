<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/18
 * Time: 14:59
 */

namespace app\admin\controller;

use app\common\controller\User as commonUser;

class User extends commonUser
{
    public function demo()
    {
        return $this->getUserName("huangjian");
    }
}