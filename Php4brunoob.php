<!DOCTYPE html>
<html>
<header>
    <title>Php测试页面</title>
</header>
<body>
<h1>使用PHP代码进行输出招呼语</h1>
<?php
$nameValue = "SummerMineJack";
$x = 5;
echo "hello SummerMineJack:" . $x . "\n";
function myTest() {
    //在函数内调用全局变量将会报编译出错,需要将全局变量添加global关键字才能使用全局变量
    global $nameValue;
    $y = "myname";
    echo $y . "is " . $nameValue;
}

myTest();
echo $nameValue;


//static 变量作用域
function staitcdTest() {
    static $x = 0;
    echo $x;
    $x++;
}

staitcdTest();

//echo和print
function echoTest() {
    $content = "PHP教程";
    $raw = array("HuangJian", "Ceshi");
    echo "{$raw[0]}" . "正在学习" . $content;
}

function printTest() {
    $content = "PHP教程";
    $raw = array("HuangJian", "Ceshi");
    print "{$raw[0]}" . "正在学习" . $content;
}

echoTest();
printTest();
//EOF
$name = "HuangJian";
$a = <<<EOF
    "abc"$name;
    "123"
EOF;

echo $a;

$students = new Students("HuangJian", 23);
echo "学生名字是：" . $students->getNames() . " 学生年龄是:" . $students->getAges();

class  Students {
    var $names;
    var $ages;

    /**
     * Students constructor.
     * @param $names
     * @param $ages
     */
    public function __construct($names, $ages) {
        $this->names = $names;
        $this->ages = $ages;
    }

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


define("Names", "HuangJian", true);
echo Names;
echo "学生名字长度是：" . strlen($students->getNames());
echo "查找某个特定的字符串Jian在字符串HuangJian中的位置信息：" . strpos($students->getNames(), "Jian");

$arrays = array("Names" => "HuangJian", "Ages" => "23", "Sex" => "genterman");
ksort($arrays);
print_r($arrays);
foreach ($arrays as $x => $name) {
    echo "key=" . $x . " Values=" . $name;
    echo "<br>";
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Names:<input type="text" name="fname">
    <input type="submit">
</form>
<?php
$nams = isset($_POST["fname"]);
echo $nams;

echo '这是第' . __LINE__ . '行';
echo '该文件位于' . __FILE__;
function test() {
    echo '函数名称:' . __FUNCTION__;
}

test();

class Base {
    function sayHello() {
        echo 'hello';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();

?>
<a href="testGetPhp.php?names=huangjian&ages=23">Go</a>
</body>
</html>
