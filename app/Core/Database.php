<?php
namespace App\Core;

use PDO;

class Database
{
    private static $instance;

    public static function getConnection()
    {
        if (!self::$instance) {
            self::$instance = new PDO(
                "mysql:host=localhost;dbname=webbandoann;charset=utf8",
                "root",
                "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return self::$instance;
    }
}
