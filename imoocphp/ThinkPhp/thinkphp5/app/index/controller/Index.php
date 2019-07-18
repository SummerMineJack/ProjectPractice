<?php

namespace app\index\controller;

use app\common\controller\Index as commonIndex;

class Index
{
    public function index()
    {

        return "this is my think php 5 app/controller/index content";
    }

    public function common()
    {
        $common = new commonIndex();
        return $common->index();
    }


}
