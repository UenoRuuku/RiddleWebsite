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
if (!isset($_SESSION)) {
    session_start();
}
$query1 = "SELECT * FROM `groups` WHERE `name` = '" . $_SESSION["username"] . "'";
//  取得查询结果
$stmt1 = $conn->prepare($query1);
$stmt1->execute();
$userInfo = $stmt1->fetch();

$query = "SELECT * FROM `problems` WHERE `number` = '" . $userInfo['answers'] . "'";
//  取得查询结果
$stmt = $conn->prepare($query);
$stmt->execute();
$problem = $stmt->fetch();


$posts = $_POST;

if($posts["answer"] === $problem["answer"]){    
    $answer2 = $userInfo['answers']+1;
    echo "<script>alert('".$answer2."');</script>";
    echo "<script>alert('正确');</script>";
    $command = $conn->prepare("UPDATE groups SET answers = ".$answer2." WHERE name = '".$userInfo['name']. "'");
    $command->execute();
}else{
    echo "<script>alert('错误');history.go(-1);</script>";
}
