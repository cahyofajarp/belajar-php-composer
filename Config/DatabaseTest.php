<?php

require_once __DIR__ . "/Database.php";

try{

    $dp = \Config\Database::getConnection();
    // Menutup Conntection
    $connection = null;
    
}catch(PDOException $exception){
    echo "Gagal Terkoneksi ke database mysql : ". $exception->getMessage() .PHP_EOL;
}
