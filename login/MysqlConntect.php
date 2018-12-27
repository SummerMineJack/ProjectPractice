<?php
/**
 * Created by PhpStorm.
 * User: Summer
 * Date: 2018/12/27
 * Time: 20:36
 */
class mysqlConntect{
    private $mysqli;
    private $result;
    public function conntct(){
        $this->mysqli=new mysqli();

    }
}