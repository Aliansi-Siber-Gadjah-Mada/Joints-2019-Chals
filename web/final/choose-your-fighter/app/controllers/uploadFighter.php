<?php

    $db = Database::getInstance();

    $filename = bin2hex(random_bytes(16)) . ".jpg";
    $name = $request['title'];

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        $_SESSION['uploadMsg'] = 'Filenya kegedean gan.';
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], __DIR__ . "/../public/static/uploads/" . $filename)) {
        $stmtFighter = $db->prepare("insert into fighters (user_id, name, src) values (:uid, :name, :src)");
        $stmtFighter->bindParam(":uid", $_SESSION['auth']['user']['id']);
        $stmtFighter->bindParam(":name", $name);
        $stmtFighter->bindParam(":src", $filename);
        $stmtFighter->execute();

        $_SESSION['uploadMsg'] = 'Sukses diupload gan.';
    } else {
        $_SESSION['uploadMsg'] = "Error gan.";
    }

    header("Location: /");