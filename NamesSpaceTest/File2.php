<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/25
 * Time: 14:12
 */

namespace Foo\Bar;
include 'File1.php';
const Foo = 2;
function foo() {

}

class foo {
    static function staticMethod() {
    }
}

/*非限定名称*/
foo();
foo::staticMethod();
echo Foo;

/*限定名称*/
subnamespace\foo();
subnamespace\foo::staticMethod();
echo \Foo\Bar\subnamespace\Foo;

/*完全限定名称*/
\Foo\Bar\subnamespace\foo();
foo::staticMethod();
echo \Foo\Bar\subnamespace\Foo;

class classname {
    public function __construct() {
        echo __METHOD__ . "\n";
    }

}

function functionname() {
    echo __FUNCTION__ . "\n";
}

const constname="gloable";
$a = 'classname';
$obj = new $a; // prints classname::__construct
$b = 'functionname';
$b(); // prints funcname
echo constant('constname'), "\n"; // prints global