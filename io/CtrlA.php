<!DOCTYPE html>
<html lang="en">

 <head>
    <title>我</title>
 </head>
 <body>
    <p>告诉我正确的数字，我就会告诉你答案</p>
    <p style="display:none">答案是：南区食堂1楼饭卡机器旁边</p>
    <?php 
    if(isset($_GET['a']) && $_GET['a'] == "30"){
        if(isset($_GET['b']) && $_GET['b'] == "12"){
            echo '<script>alert("应该不会有人以为是南区食堂1楼饭卡机旁边吧，答案在南区学生超市哦");</script>';
        }
    }
 ?>
 </body>
 </html>
