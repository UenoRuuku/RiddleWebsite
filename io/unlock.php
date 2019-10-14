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

$stmt3 = $conn->prepare("SELECT * FROM groups WHERE name = '".$_POST["name"]."'");
$stmt3->execute();
$userO = $stmt3->fetch();


$stmt = $conn->prepare("UPDATE groups SET lockT = ".$_POST["lockie"]." WHERE name = '".$_POST['name']."'");
$stmt->execute();



$stmt2 = $conn->prepare("SELECT * FROM groups WHERE name = '".$_POST["name"]."'");
$stmt2->execute();
$user = $stmt2->fetch();

if($user != null){
    echo "<script>alert('" . $user["name"] . " 修改成功.（1表示锁定，0表示解锁）原始状态为".$userO["lockT"]."，当前状态为".$user["lockT"]."');history.go(-1);</script> ";
}else{
    echo "<script>alert('修改不成功，请检查账户名');history.go(-1);</script> ";
}