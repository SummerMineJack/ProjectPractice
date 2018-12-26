<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/25
 * Time: 14:52
 */
class BaseBean{
    var $names;
    var $ages;

    /**
     * @return mixed
     */
    public function getNames() {
        return $this->names;
    }

    /**
     * @param mixed $names
     */
    public function setNames($names) {
        $this->names = $names;
    }

    /**
     * @return mixed
     */
    public function getAges() {
        return $this->ages;
    }

    /**
     * @param mixed $ages
     */
    public function setAges($ages) {
        $this->ages = $ages;
    }

}