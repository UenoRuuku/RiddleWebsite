<!DOCTYPE html>
<html lang="en">
<?php


function ppp()
{
    header('Content-type:text/html;charset=utf-8');
    $db = new mysqli('localhost', 'root', '', 'io');
    $rows = $db->query('SELECT * FROM groups');
    echo '<table class="table"><thead><tr><th>队伍账号</th><th>答题数</th></tr></thead>';
    while ($row = $rows->fetch_assoc()) {
        echo '<tr><td>' . $row['name'] . '</td>';
        echo '<td>' . $row['answers'] . '</td></tr>';
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>排行榜！！！</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">

</head>

<body>
    <?php
    include "title.php";
    ?>
    <div class="container text-center">
        <div class="jumbotron" style="background-color: rgba( 103, 193, 245, 0.2 );">

            <?php
            ppp();
            ?>
            </table>

        </div>
    </div>

    <?php
    include "footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src='js/super.js'>
    </script>
</body>

</html>