<?php

/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/25
 * Time: 14:39
 */
include "BaseBean.php";

class UserBean extends BaseBean implements iTemplete {
    var $userId;
    var $userName;
    var $userAge;
    var $userAdress;

    public function getNames() {
        return parent::getNames(); // TODO: Change the autogenerated stub
    }

    public function setNames($names) {
        parent::setNames($names); // TODO: Change the autogenerated stub
    }

    //方法重写
    public function getAges() {
        echo $this->userName.PHP_EOL;
        return $this->userName; // TODO: Change the autogenerated stub
    }

    public function setAges($ages) {
        parent::setAges($ages); // TODO: Change the autogenerated stub
    }

    //当当前类进行调用结束时、可将类进行销毁的方法
    public function __destruct() {
        // TODO: Implement __destruct() method.
        print "销毁 " . $this->userName . "\n";
    }


    /**
     * UserBean constructor.
     */
    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName) {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserAge() {
        return $this->userAge;
    }

    /**
     * @param mixed $userAge
     */
    public function setUserAge($userAge) {
        $this->userAge = $userAge;
    }

    /**
     * @return mixed
     */
    public function getUserAdress() {
        return $this->userAdress;
    }

    /**
     * @param mixed $userAdress
     */
    public function setUserAdress($userAdress) {
        $this->userAdress = $userAdress;
    }


    public function getUserNames($name, $var) {
        // TODO: Implement getUserNames() method.
    }
}
interface  iTemplete{
    public function getUserNames($name,$var);
}