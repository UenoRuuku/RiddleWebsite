<?php
include "connect.php";

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
