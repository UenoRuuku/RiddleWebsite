<?php
include "connect.php";

$null = null;

$stsm = $conn->prepare("INSERT INTO groups ( name,passcode) VALUES ( '".$_POST["name"]."', '".$_POST["passcode"]."');");
$stsm->execute();

echo "<script>alert('注册成功');history.go(-1);</script> ";
