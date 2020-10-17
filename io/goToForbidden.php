<?php
    date_default_timezone_set("Asia/Shanghai");
    if(date('G')<7 && date('G')>23){
        echo "<script>location.href='forbidden.php'</script>";
    }