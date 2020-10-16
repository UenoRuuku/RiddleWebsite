<?php
include "connect.php";

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