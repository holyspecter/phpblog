<?php
    require_once '../inc/connect.php'; //подключаем БД
    session_start();
    if (isset($_SESSION['adm'])) {       
        if (isset($_GET['id']))
        {
            $delid = $_GET['id'];
            $sql = "DELETE FROM content WHERE id=$delid";
            mysql_query($sql);
            echo "<script>history.go(-1)</script>";
        }
    } else {        
        header('Location: index.php');
    }
?>
