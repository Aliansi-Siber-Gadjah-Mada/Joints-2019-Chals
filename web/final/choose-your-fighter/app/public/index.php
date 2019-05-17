<?php
    session_start();

    require __DIR__ . "/../vendor/autoload.php";

    $dotenv = Dotenv\Dotenv::create(__DIR__ . "/../");
    $dotenv->load();

    require __DIR__ . "/../bootstrap/app.php";