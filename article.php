<!---Отображается -->
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/1.css" type="text/css" media="screen,projection" />
        <title>Тестовое задание</title>
</head>

<?php
    if (isset($_GET['id']))    
        $article_id = intval($_GET['id']);
    else
        die("Страница не доступна!");
    
    require_once '/inc/connect.php'; //подключаем БД
    session_start();
    
    //достаем нужную запись из БД
    $sql = "SELECT * FROM content WHERE id=$article_id";
    $res = mysql_query($sql);
    $article = mysql_fetch_array($res);
    ?>
<div id="container">

   <?php
   
    require_once 'view/header.php'; //подключаем шапку
    //выводим оную    
    echo "<div id='content'>";
    echo "<h2><b>" . $article['title'] . "</b></h2><br />";
    //выводим картинку, если есть
    if ($article['img_path'] != "") {
                echo "<img src='" . $article['img_path'] . "' width='300' /><br />";
    }
    echo "<b>" . $article['prev'] ."</b><br />";
    echo $article['text'] . "<br />";
    echo "Автор: " . $article['author'] . "<br />";
    
    //если админ, то функции добавляем
    if (isset($_SESSION['adm'])) {
        echo "<a href='adm/edit.php?id=" . $article['id'] . "' style='color:red;'>Редактировать&nbsp</a>";
        echo "<a href='adm/delete.php?id=" . $article['id'] ."' style='color:red;'>Удалить</a>" . "<br />";            
    }
    echo "<br />" . "<p><a href='javascript:history.back()' class='input_label'>Назад</a></p>";
    echo '</div>';
    
?>
