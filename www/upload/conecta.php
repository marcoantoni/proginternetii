<?php
    
    /* 
        Após ter trabalhado com SQL Injection, sabemos que NÃO DEVEMOS se conectar com o usuário root ao banco de dados
    */

    $con = mysqli_connect("mysql", "root", "1234", "upload");

    if (!$con) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
?>