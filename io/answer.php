<?php
include "connect.php";

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

$cheat = "false";

$db = new mysqli('localhost', 'root', '', 'io');
$rows = $db->query('SELECT * FROM problems');
while ($row = $rows->fetch_assoc()) {
    if ($posts["answer"] == $row["answer"]) {
        $cheat = "true";
        if ($row["number"] == $userInfo["answers"]) {
            $cheat = "false";
        }
    }
}
$datetime = date_create()->format('Y-m-d H:i:s');
$datetime_time = strtotime('+6 Hour',$datetime);
mysqli_close($db);


if ($posts["answer"] === $problem["answer"]) {
    //上传到upload中
    $stsm = $conn->prepare("INSERT INTO upload ( name, number,content, cheat,date, judge) VALUES ('" . $userInfo['name'] . "', " . $userInfo['answers'] . ",'" . $posts["answer"] . "', '".$cheat."' , '" . $datetime . "', 'true' );");
    $stsm->execute();

    $nu = '0';

    $answer2 = $userInfo['answers'] + 1;
    echo "<script>alert('" . $answer2 . "');</script>";
    echo "<script>alert('正确');history.go(-1)</script>";
    $command = $conn->prepare("UPDATE groups SET answers = " . $answer2 . ",lockT = ". $nu ." WHERE name = '" . $userInfo['name'] . "'");
    $command->execute();
} else {
    //上传到upload中
    $nu = '1';
    $stsm2 = $conn->prepare("INSERT INTO upload ( name, number,content, cheat,date, judge) VALUES ('" . $userInfo['name'] . "', " . $userInfo['answers'] . " ,'" . $posts["answer"] . "', '".$cheat."' , '" . $datetime . "', 'false' );");
    $stsm2->execute();
    $command2 = $conn->prepare("UPDATE groups SET lockT = '" . $nu . "',lockTime = '". $datetime ."' WHERE name = '" . $userInfo['name'] . "'");
    $command2->execute();
    echo "<script>alert('错误：您可能将为此锁定30min，当前时间". $datetime ."，请联系管理员解除锁定');history.go(-1);</script>";
}
