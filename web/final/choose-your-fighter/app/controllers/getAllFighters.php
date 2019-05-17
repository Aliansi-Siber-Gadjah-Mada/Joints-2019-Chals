<?php

    $db = Database::getInstance();
    $stmt = $db->prepare("select * from fighters where has_reviewed = 0");
    $stmt->execute();

    $fighters = $stmt->fetchAll();

    header('Content-type: application/json');
    echo json_encode($fighters);