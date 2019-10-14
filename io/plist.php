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

function login()
{
    //  防止全局变量造成安全隐患
    $admin = false;
    //  启动会话，这步必不可少
    $conn = connectMysql();
    if (!isset($_SESSION)) {
        session_start();
    }
    $query1 = "SELECT * FROM `groups` WHERE `name` = '" . $_SESSION["username"] . "'";
    //  取得查询结果
    $stmt1 = $conn->prepare($query1);
    $stmt1->execute();
    $userInfo = $stmt1->fetch();

    //  判断是否登陆
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true && isset($_SESSION["username"])) {
        $db = new mysqli('localhost', 'root', '', 'io');
        $rows = $db->query('SELECT * FROM problems');
        $nu = 1;
        while ($row = $rows->fetch_assoc()) {
            if ($nu <= $userInfo['answers']) {
                echo '<p>
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse' . $nu . '" style="color:#fff">
                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>第' . $nu . '题
            </a>
                </p>';
                echo '<div  id="collapse' . $nu . '" class="accordion-body collapse">
                <h2>'. $nu. '.' . $row['title'] . '</h2>';
                if ($row['image'] != null) {
                    echo "<img style='max-width:100%' src='img/".$row['image']."'>";
                 }
                echo '<p>' . $row['problem'] . '</p>
            </div>';
            }
            $nu++;
        }
        echo '</table>';
    } else {
        echo '<p><a class="btn btn-success btn-lg"  data-toggle="modal" data-target="#loginModal" role="button">登录</a></p>';
        echo '<p>
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" style="color:#fff">
            <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>注册
        </a>
    </p>
    <form method="post" action="register.php" id="collapseThree" class="accordion-body collapse">
        <h3>欢迎来到账号注册系统</h3>
        <p>*请输入需要注册的账号名</p>
        <input type="text" name="name" class="form-control" required>
        <p>*请输入密码</p>
        <input type="text" name="passcode" class="form-control" required>
        <br>
        <br>
        <br>
        <br>
        <button type="submit" class="btn btn-success">提交</button>
    </form>';
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>往期题目</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
</head>

<body style="">
    <?php
    include "title.php";
    ?>

    <div class="container text-center">
        <div class="jumbotron">
            <img src="img/head.jpg">
            <br>
            <br>
            <br>
            <?php
            login();
            ?>
        </div>

    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">登录</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="login.php" method="post">
                        <div class="form-group">
                            <label for="name">账户</label>
                            <input type="text" class="form-control text" name="username" placeholder="请输入名称">
                            <span class="help-block">您的账户应通过群发给您</span>
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" class="form-control text" name="password" placeholder="请输入密码">
                            <span class="help-block">您的密码应通过群发给您</span>
                        </div>


                </div>
                <div class="modal-footer register_submit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">登录</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <br>
    <br>
    <br>
    <br>

    <?php
    include "footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/super.js"></script>
</body>

</html>