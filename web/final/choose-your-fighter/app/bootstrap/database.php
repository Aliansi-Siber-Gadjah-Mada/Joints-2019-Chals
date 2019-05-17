<?php

    class Database
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
                Self::$driver = getenv("DB_CONNECTION", "mysql");
                Self::$host = getenv("DB_HOST", "127.0.0.1");
                Self::$port = getenv("DB_PORT", 3306);
                Self::$db = getenv("DB_DATABASE", "homestead");
                Self::$username = getenv("DB_USERNAME", "root");
                Self::$password = getenv("DB_PASSWORD", "");

                try 
                {
                    // $conn = new PDO(Self::$driver.":host=mysql;port=".Self::$port.";dbname=".Self::$db, Self::$username, Self::$password);
                    $conn = new PDO('mysql:host=db;dbname=jointsmantap;charset=utf8mb4', 'root', 'jointsmantap123');
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e)
                {
                    return "Error bambank";
                }

                Self::$instance = $conn;
                return $conn;
            }
        }
    }