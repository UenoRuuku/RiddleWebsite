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

$null = null;

$conn = connectMysql();
$stsm = $conn->prepare("INSERT INTO groups ( name,passcode) VALUES ( '".$_POST["name"]."', '".$_POST["passcode"]."');");
$stsm->execute();

echo "<script>alert('注册成功');history.go(-1);</script> ";
