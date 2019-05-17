<?php
    $src = $request['src'];

    $db = Database::getInstance();
    $stmt = $db->prepare("select * from fighters where src = :src");
    $stmt->bindParam(":src", $src);
    $stmt->execute();

    $img = $stmt->fetch();

    if (!$img)
    {
        require __DIR__ . "/../views/404.php";
        exit();
    }

    $stmtUpdate = $db->prepare("update fighters set has_reviewed = 1 where src = :src");
    $stmtUpdate->bindParam(":src", $src);
    $stmtUpdate->execute();

    require __DIR__ . "/../views/fighter.php";