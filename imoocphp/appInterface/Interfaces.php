<?php

/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/16
 * Time: 15:49
 */
require_once '../../login/MysqlConntect.php';

interface  selectUserInfo
{
    public function getUserInfo();
}

class UserInfo implements selectUserInfo
{

    public function getUserInfo()
    {
        // TODO: Implement getUserInfo() method.
        $cont = mysqlConntect::getInstance();
        $sql = "select * from userinfo";
        $result = $cont->sel4Sql($sql);
        while ($row=mysqli_fetch_assoc($result)){
            $userinfos[]=$row;
        }
        print_r($userinfos);
        $cont->close();
    }
}
UserInfo::getUserInfo();
