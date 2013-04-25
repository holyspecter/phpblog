<!---Отображается -->
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/phpblog/css/1.css" type="text/css" media="screen,projection" />
        <title>Тестовое задание</title>
</head>
<?php
    require_once '../inc/connect.php'; //подключаем БД
    session_start();        
    
    if (isset($_SESSION['adm'])) {       
        if (isset($_GET['id'])) {
            
            if (isset($_GET['message']))
                echo '<i>Измененеия сохранены!</i><br />';
            
            $id = $_GET['id'];
            $sql = "SELECT * FROM content WHERE id=$id";
            $res = mysql_query($sql);
            $article = mysql_fetch_array($res);
            ?>
             
<div id="container">
    
           <?php
           
           require_once '../view/header.php';
           
           if (isset($_GET['message']))
                echo "<h2><i style='color: red; margin-left:10px'>Измененеия сохранены!</i></h2><br />";
            //выводим картинку, если есть
            if ($article['img_path'] != "") {
                echo "<img src='../" . $article['img_path'] . "' width='300' style='margin-left: 10px'/>";
            }
            ?>
            <form action="update.php" method="post" enctype="multipart/form-data" style="margin-left: 10px">                
                <input type="hidden" name="id" value="<?=$article['id']?>">
                <h2>Название:</h2><br />
                <input type="text" name="title" value="<?=$article['title']?>" style="width: 300px;" /> <br />
                <h2>Превью:</h2><br />
                <textarea name="prev" rows="3" cols="38" ><?=$article['prev']?></textarea> <br />
                <h2>Текст:</h2><br />
                <textarea name="text" rows="10" cols="38" ><?=$article['text']?></textarea> <br />
                <h2>Изображение (не более 500кб):</h2>
                <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                <input type="file" name="img"><br /><br />
                <input type="submit" value="Сохранить" />
            </form>                                
            
<?php            
        }        
    } else {        
        header('Lcoation: index.php');
    }
?>
