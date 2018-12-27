<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 2018/12/27
 * Time: 10:02
 */
$servername = "localhost";
$username = "root";
$password = "hj1649789..";
$dbname = "Pdotestdb";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    echo "数据库连接成功";
    echo PHP_EOL;
    //设置PDO模式为异常模式
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //创建数据库
    $createDbSql = "create database " . $dbname;
//    $conn->exec($createDbSql);
    echo "数据库创建成功";
    echo PHP_EOL;
    //创建数据表
    $createTableSql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
//    $conn->exec($createTableSql);
    echo "创建数据表成功";
    echo PHP_EOL;
    //插入数据
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    // 使用 exec() ，没有结果返回
//    $conn->exec($sql);
    echo "插入数据成功";
    echo PHP_EOL;
    //插入多条数据
    $conn->beginTransaction();
    // SQL 语句
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES ('John', 'Doe', 'john@example.com')");
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES ('Mary', 'Moe', 'mary@example.com')");
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES ('Julie', 'Dooley', 'julie@example.com')");
    $conn->commit();
    echo "插入多条数据成功";
    echo PHP_EOL;
    //预处理sql绑定参数
    $smrt = $conn->prepare("insert into MyGuests (firstname,lastname,email) values (:firstname,:lastname,:email)");
    $smrt->bindParam(":firstname",$firstname);
    $smrt->bindParam(":lastname",$lastname);
    $smrt->bindParam(":email",$email);
    // 插入行
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
//    $smrt->execute();

    // 插入其他行
    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
//    $smrt->execute();

    // 插入其他行
    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
//    $smrt->execute();

    echo "新记录插入成功";
    echo PHP_EOL;
    //读取数据
    $selSql="select * from MyGuests";
    $smtp=$conn->prepare($selSql);
    $smtp->execute();
    $result = $smtp->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($smtp->fetchAll())) as $k=>$v) {
        echo $v;
    }

} catch (PDOException $e) {
    $conn->rollBack();
    die($e);
}
$conn = null;

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

