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
                $file = "../img/" . basename($_FILES['img']['name']);
                if (!move_uploaded_file($_FILES['img']['tmp_name'], $file))
                    $file = "";
                $sql = "UPDATE content SET title='" .$title . "', prev='". $prev . 
                        "', text='" . $text .
                        "',  img_path='img/" . basename($_FILES['img']['name']) . 
                        "' WHERE id=" .$_POST['id'];    
            } else {
                $sql = "UPDATE content SET title='" .$title . "', prev='". $prev . 
                        "', text='" . $text . "' WHERE id=" .$_POST['id'];    
                                
            }                        
            $res = mysql_query($sql);            
            $location = "edit.php?id=" . $_POST['id'] . "&message=true";
            
            header("Location: " . $location);
        }
    }

?>
