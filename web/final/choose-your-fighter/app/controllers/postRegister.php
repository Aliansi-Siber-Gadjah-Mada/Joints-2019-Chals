<?php

    $db = Database::getInstance();

    $stmtCheck = $db->prepare(
        "select * from users where username = :username "
    );
    $stmtCheck->bindParam(":username", $request["username"]);
    $stmtCheck->execute();

    $user = $stmtCheck->fetch();

    if ($user)
    {
        $_SESSION['err'] = "Username telah terdaftar.";
        header("Location: /auth/register");
        exit();
    }

    $password = password_hash($request["password"], PASSWORD_DEFAULT);

    $stmtReg = $db->prepare(
        "insert into users (username, password) values (:username, :password)"
    );
    $stmtReg->bindParam(":username", $request["username"]);
    $stmtReg->bindParam(":password", $password);

    if ($stmtReg->execute())
    {
        $stmtCheck = $db->prepare(
            "select * from users where username = :username"
        );
        $stmtCheck->bindParam(":username", $request["username"]);
        $stmtCheck->execute();

        $_SESSION['auth']['user'] = $stmtCheck->fetch();
        $_SESSION['auth']['authenticated'] = true;

        header("Location: /");
    }
    else
    {
        $_SESSION['err'] = "Registrasi gagal.";
        header("Location: /auth/register");
    }

    exit();