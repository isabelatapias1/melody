<?php
    $databaseHost = 'localhost';
    $databaseName = 'melody_ussers';
    $databaseUsername = 'root';
    $databasePassword = '';

    try {
        $dbConn = new PDO("mysql:host={$databaseHost}; dbname={$databaseName}", 
        $databaseUsername, $databasePassword);
        
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }
?>