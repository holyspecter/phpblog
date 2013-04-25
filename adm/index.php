<!---Отображается -->
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?php
require_once '../inc/connect.php';
session_start();

if (isset($_SESSION["adm"])) {    
        header('Location: ../index.php');                                
 } else if (isset($_POST['mlogin'])) {
     
    $sql = mysql_query("Select * from users");
    $adminfo = mysql_fetch_assoc($sql);
    
    if(md5($_POST["mpass"]) == $adminfo['password']) {                     
        $_SESSION['adm'] =  $_POST['mlogin'];
        header('Location: index.php');        
    }    
 } else {
     require_once 'logform.html';
 } 
