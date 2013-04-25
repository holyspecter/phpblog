<?php
    $link = mysql_connect('localhost', 'root', '') or die("DB connection failed!");
    mysql_select_db('phpblog', $link);
    mysql_query("SET CHARACTER SET 'utf8'"); //для нормального отображения символов    
    mysql_query('set character_set_results="utf8"');
    mysql_query('set collation_connection="utf8_general_ci"');

