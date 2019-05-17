<?php
    namespace App\Http\Service;

    class DBService
    {
        private static $driver;
        private static $host;
        private static $port;
        private static $db;
        private static $username;
        private static $password;

        private static $instance = null;

        public static function getInstance()
        {
            if(Self::$instance != null)
            {
                return Self::$instance;
            }
            else
            {
                Self::$driver = env("DB_CONNECTION", "mysql");
                Self::$host = env("DB_HOST", "127.0.0.1");
                Self::$port = env("DB_PORT", 3306);
                Self::$db = env("DB_DATABASE", "homestead");
                Self::$username = env("DB_USERNAME", "root");
                Self::$password = env("DB_PASSWORD", "");

                try 
                {
                    $conn = new \PDO(Self::$driver.":host=".Self::$host.";dbname=".Self::$db, Self::$username, Self::$password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                }
                catch(\PDOException $e)
                {
                    return "Error bambank";
                }

                Self::$instance = $conn;
                return $conn;
            }
        }
    }