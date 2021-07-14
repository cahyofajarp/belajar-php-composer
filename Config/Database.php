<?php

namespace Config{
    class Database{
        static function getConnection(): \PDO
        {
                $host = "127.0.0.1";
                $port = 3306;
                $database = "belajar_php_pdo";
                $username = "root";
                $password = "";
                
                return new \PDO("mysql:host=$host:$port;dbname=$database",$username,$password,
                array(
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::MYSQL_ATTR_DIRECT_QUERY => false,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                    )
                );
        }
    }
}
