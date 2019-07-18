<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/18
 * Time: 14:44
 */

namespace app\admin\controller;

use app\common\controller\Index as commonIndex;

class Index
{
    public function index()
    {
        return "hahahhaa";
    }

    public function common()
    {
        $common = new commonIndex();
        return $common->index();
    }
}