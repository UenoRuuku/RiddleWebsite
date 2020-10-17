<?php
    date_default_timezone_set("Asia/Shanghai");
    if(date('G')<6 || date('G')>23){
        echo "<script>location.href='forbidden.php'</script>";
    }