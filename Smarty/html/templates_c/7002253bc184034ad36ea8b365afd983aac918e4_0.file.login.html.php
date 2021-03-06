<?php
/* Smarty version 3.1.33, created on 2019-05-07 10:42:13
  from 'D:\RnWorkSpace\PhpProject\ProjectPractice\Smarty\html\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd144e5610cd2_09730805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7002253bc184034ad36ea8b365afd983aac918e4' => 
    array (
      0 => 'D:\\RnWorkSpace\\PhpProject\\ProjectPractice\\Smarty\\html\\login.html',
      1 => 1557218532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd144e5610cd2_09730805 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!--[if lt IE 7 ]>
<html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>
<html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>
<html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="zh" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="UTF-8"/>
    <title>登录</title>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../css/animate-custom.css"/>
</head>
<body>
<div class="container">
    <header>
        <h1>Login and Registration Form <span>with HTML5 and CSS3</span></h1>
    </header>
    <section>
        <div id="container_demo">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form action="SmartyLogin.php" autocomplete="on " method="post">
                        <h1>Log in</h1>
                        <p>
                            <label for="username" class="uname" data-icon="u"> Your email or username </label>
                            <input id="username" name="username" required="required" type="text" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"
                                   placeholder="myusername or mymail@mail.com"/>
                        </p>
                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                            <input id="password" name="password" required="required" type="password"
                                   placeholder="eg. X8df!90EO"/>
                        </p>
                        <p class="keeplogin">
                            <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping"/>
                            <label for="loginkeeping">Keep me logged in</label>
                        </p>
                        <p class="login button">
                            <input type="submit" value="Login"/>
                        </p>
                        <p class="change_link">
                            Not a member yet ?
                            <a href="#toregister" class="to_register">Join us</a>
                        </p>
                    </form>
                </div>

                <div id="register" class="animate form">
                    <form action="SmartyRegist.php" autocomplete="on" method="post">
                        <h1> Sign up </h1>
                        <p>
                            <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                            <input id="usernamesignup" name="usernamesignup" required="required" type="text"
                                   placeholder="mysuperusername690"/>
                        </p>
                        <p>
                            <label for="emailsignup" class="youmail" data-icon="e"> Your email</label>
                            <input id="emailsignup" name="emailsignup" required="required" type="email"
                                   placeholder="mysupermail@mail.com"/>
                        </p>
                        <p>
                            <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                            <input id="passwordsignup" name="passwordsignup" required="required" type="password"
                                   placeholder="eg. X8df!90EO"/>
                        </p>
                        <p>
                            <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your
                                password </label>
                            <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required"
                                   type="password" placeholder="eg. X8df!90EO"/>
                        </p>
                        <p class="signin button">
                            <input type="submit" value="Sign up"/>
                        </p>
                        <p class="change_link">
                            Already a member ?
                            <a href="#tologin" class="to_register"> Go and log in </a>
                        </p>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>
</body>
</html><?php }
}
