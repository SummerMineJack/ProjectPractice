<?php
namespace app\common\controller;

class Index
{
    public function index()
    {
        return "this is my think php 5 app/common/index content";
    }
    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
