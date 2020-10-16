<?php
include "connect.php";

$stmt3 = $conn->prepare("SELECT * FROM groups WHERE name = '".$_POST["name"]."'");
$stmt3->execute();
$userO = $stmt3->fetch();


$stmt = $conn->prepare("UPDATE groups SET answers = ".$_POST["number"]." WHERE name = '".$_POST['name']."'");
$stmt->execute();



$stmt2 = $conn->prepare("SELECT * FROM groups WHERE name = '".$_POST["name"]."'");
$stmt2->execute();
$user = $stmt2->fetch();

if($user != null){
    echo "<script>alert('" . $user["name"] . " 修改成功.初始题号为".$userO["answers"]."，当前题号为".$user["answers"]."');history.go(-1);</script> ";
}else{
    echo "<script>alert('修改不成功，请检查账户名');history.go(-1);</script> ";
}

