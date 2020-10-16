<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";

function login()
{
    //  防止全局变量造成安全隐患
    $admin = false;
    //  启动会话，这步必不可少
    if (!isset($_SESSION)) {
        session_start();
    }
    //  判断是否登陆
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true && isset($_SESSION["username"]) && $_SESSION['username'] === "master") {
        echo '<span>欢迎回来,<h2>' . $_SESSION['username'] . '</h2></span>';
        echo '<br>';
        echo '<br>';
        include "form.php";
    } else {
        echo '<p><a class="btn btn-success btn-lg"  data-toggle="modal" data-target="#loginModal" role="button">以管理员身份登录</a></p>';
    }
}



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>推理定向后台</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
</head>

<body>
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
        <br><br><br><br><br><br><br>
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
                            <span class="help-block">您的账户应为管理员账户</span>
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" class="form-control text" name="password" placeholder="请输入密码">
                            <span class="help-block">您的密码应为管理员密码</span>
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

    <?php
    include "footer.php";
    ?>


    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
    </script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src='js/super.js'> </script>
</body>

</html>