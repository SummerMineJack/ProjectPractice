<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/8
 * Time: 13:52
 */
//删除coookie直接将过期时间往前进行即可 time()-1;
setcookie("userInfo[username]", "huangjian", time() + 3600);
setcookie("userInfo[addr]", "hsanghai", time() + 3600);
setcookie("userInfo[email]", "hjzxzone@163.com", time() + 3600);