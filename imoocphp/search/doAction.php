<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/7/15
 * Time: 11:24
 */
include_once '../../login/MysqlConntect.php';
$keyWord = $_GET['username'];
$conn = mysqlConntect::getInstance();
$sql = "SELECT * FROM userinfo WHERE username LIKE '%$keyWord%'";
$connResult = $conn->sel4Sql($sql);
while ($row = mysqli_fetch_assoc($connResult)) {
    $row['username'] = str_replace($keyWord, '<label style="color: red">' . $keyWord . '</label>', $row['username']);
    $selectRow[] = $row;
}
if (empty($selectRow)) {
    echo "没有查询到相关用户名";
} else {
    ?>
    <table id="result_table" border="1px" cellpadding="3" cellspacing="0" style="width: 60%;margin:20px auto">
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>email</th>
            <th>pwd</th>
        </tr>
        <?php foreach ($selectRow as $k => $v) { ?>
            <tr>
                <td><?php echo $v['id'] ?></td>
                <td><?php echo $v['username'] ?></td>
                <td><?php echo $v['useremail'] ?></td>
                <td><?php echo $v['userpassword'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php
}
?>
