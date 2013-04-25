<!---Отображается -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/1.css" type="text/css" media="screen,projection" />
        <title>Тестовое задание</title>
    </head>
    <body>
        <?php
        require_once 'inc/connect.php'; //подключаем БД        
        session_start();?>
        
        <div id="container">        
         
        <?php
        require_once 'view/header.php'; //подключаем шапку
        $num = 10;  //количество статей на странице
        //определяем страницу
        if ((!isset($_GET['page'])) || ($_GET['page'] <= 0)) {
            $page = 1;
        } else {
            $page = intval($_GET['page']);
        }
        
        //считаем общее к-во страниц
        $result = mysql_query("SELECT COUNT(*) FROM content");         
        $posts = mysql_result($result, 0);          
        $total = intval(($posts - 1) / $num) + 1;  
        
        //извлекаем нужные записи из БД
        mysql_query("SET CHARACTER SET 'utf8'");
        $start = $page * $num - $num;       
        $sql = "SELECT * FROM content LIMIT $start, $num";
                
        $res = mysql_query($sql);                               
        
        //выводим записи
        echo "<div id='content'>";
        while ($row = mysql_fetch_array($res))
        {
            echo "<h2><a href='article.php?id=" . $row['id'] . "'>" . $row['title']  . "</a></h2>" . "<br />";
            echo $row['prev'] . "<br />";
            
            //если админ, то функции добавляем
            if (isset($_SESSION['adm'])) {
                echo "<a href='adm/edit.php?id=" . $row['id'] . "' style='color:red;'>Редактировать&nbsp</a>";
                echo "<a href='adm/delete.php?id=" . $row['id'] ."' style='color:red;'>Удалить</a>" . "<br />";            
            }
            echo '...................................................................................' . "<br />";                      
        }
        
        //создаем навигационную строку
        $navstr = "";
        for ($i = 1; $i <= $total; $i++)
        {
            if ($i == $page) {
                $navstr .= "<b>$i </b>";
            } else {
                $navstr .= "<a href='index.php?page=" . $i . "'>$i </a>";           
            }
        }
                            
        echo $navstr;
        echo '</div>';
               
        ?>
        
    </body>
</html>
