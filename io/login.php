<?php
function connectMysql()
{
    $dbms = 'mysql';     //数据库类型
    $host = 'localhost'; //数据库主机名
    $dbName = 'io';    //使用的数据库
    $user = 'root';      //数据库连接用户名
    $pass = '';          //对应的密码
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



$conn = connectMysql();
//  表单提交后...
$posts = $_POST;

//使用md5加密密码 6/6更新 已经放弃
$password = $posts["password"];
$username = $posts["username"];

$query = "SELECT * FROM `groups` WHERE `passcode` = '$password' AND `name` = '$username'";
//  取得查询结果
$stmt = $conn->prepare($query);
$stmt->execute();
$userInfo = $stmt->fetch();
if (!empty($userInfo)) {
    //  当验证通过后，启动 Session

    if (!isset($_SESSION)) {
        session_start();
    }
    //  注册登陆成功的 admin 变量，并赋值 true
    $_SESSION["admin"] = true;
    $_SESSION["username"] = $userInfo["name"];
    echo "<script>history.go(-1);</script>";
} else {
    echo "<script>alert('账号或密码错误');history.go(-1);</script>";
}
