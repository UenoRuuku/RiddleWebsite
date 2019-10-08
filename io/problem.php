<!DOCTYPE html>
<html lang="en">
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

function ppp()
{
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
    echo "<h3>" . $problem['number'] . '. '.$problem['title'].'</h3>';
    if ($problem['image'] != null) {
        echo "<img src='img/".$problem['image']."'>";
     }
    echo "<p>" . $problem['problem'] . '</p>';
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>答题</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <?php
    include "title.php";
    ?>
    <div class="container text-center">
        <div class="jumbotron">
            <form role="form" method="post" action="answer.php">
                <br>
                <?php
                ppp();
                ?>
                <br>
                <input type="text" class="form-control text" name="answer" placeholder="请输入答案">
                <br>
                <br>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src=“js/super.js”> </script> </body> </html>