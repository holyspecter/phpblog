<?php
    require_once '../inc/connect.php'; //подключаем БД
    session_start();
    header ('Content-type: text/html; charset=utf-8');
    
    if (isset($_SESSION['adm'])) {       
        if (isset($_POST['title'])) {                 
            $title = mysql_real_escape_string($_POST['title']);
            $prev = mysql_real_escape_string($_POST['prev']);
            $text = mysql_real_escape_string($_POST['text']);
            if ($_FILES['img']['size'] != 0) {
                echo 'first if';
                $file = "../img/" . basename($_FILES['img']['name']);
                if (!move_uploaded_file($_FILES['img']['tmp_name'], $file))
                    $file = "";
                $sql = "INSERT INTO content(title, prev, text, img_path) VALUES('" .$title . "', '". $prev . 
                        "', '" . $text .
                        "', '" . $file . "')";    
            } else {
                $sql = "INSERT INTO content(title, prev, text) VALUES('" .$title . "', '". $prev . 
                        "', '" . $text . "')";                                                        
            }                         
            $res = mysql_query($sql);            
            
            header("Location: create.php?message=true");
        }
    }

?>
