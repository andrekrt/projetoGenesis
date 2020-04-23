<?php

    $dsn = "mysql:dbname=weturismo; host=localhost";
    $dbuser="root";
    $pass= "";

    try{
        $pdo = new PDO ($dsn,$dbuser,$pass);
    }catch(PDOException $e){
        echo "A conexão falhou: " .$e->getMessage();

    }

?>