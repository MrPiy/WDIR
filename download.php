<?php
    session_start();
    include_once 'dclass.php';
    $DF=new share();
    if($_SESSION['user'] || $file=$DF->file($_SESSION['file'])){//验证user
            header("Content-Type: application/octet-stream");
            header('X-Accel-Redirect: /down/'.$_GET['file']);//跳转到 down
    }else{
        
        header("http/1.1 403 Forbidden");
    }
 ?>
