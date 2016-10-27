<?php

class Database
{

    private static $dbservername = "mysql:host=localhost;dbname=personal_finance_manager";
    private static $dbusername = "root";
    private static $dbpassword = null;
    private static $db;



    public function __construct()
    {
    }

    public static function getDB()
    {
        try {
            self::$db = new PDO(self::$dbservername, self::$dbusername, self::$dbpassword);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('database/database_error.php');
            exit();
        }
        return self::$db;
    }


}