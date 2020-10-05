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
$imgname = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$filepath = 'img/';
if ((($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
    && ($_FILES["file"]["size"] < 200000)
) {
    if (file_exists($filepath . $_FILES["file"]["name"])) {
        echo "<script>alert('上传出现错误:尝试更换文件名');history.go(-1);</script> ";
    } else {
        move_uploaded_file($tmp, $filepath . $imgname);
        $stmt = $conn->prepare("UPDATE problems SET problem = '".$_POST['problem']."', title = '".$_POST['title']."', answer = '".
    $_POST["answer"]."', image = '".$imgname."' WHERE number = ".$_POST['number']);
        $stmt->execute();
        echo "<script>alert('" . $_FILES["file"]["name"] . " 上传成功.');history.go(-1);</script> ";
    }
}
if($_POST["clear"] === "yes"){
    $stmt2 = $conn->prepare("UPDATE problems SET image = null WHERE number = ".$_POST["number"]);
    $stmt2->execute();
    echo "<script>alert('上传成功.');history.go(-1);</script> ";
}