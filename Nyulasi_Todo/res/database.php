<?php
function DatabaseConnection(){
    $dsn ="mysql:host=localhost;dbname=tester;charset=utf8";
    $user="admin";
    $pass="admin";
    $db = new PDO($dsn, $user, $pass);
    return $db;
    
    
}

?>