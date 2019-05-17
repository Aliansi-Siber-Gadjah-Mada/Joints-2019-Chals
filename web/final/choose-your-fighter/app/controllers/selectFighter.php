<?php
    // Seleksi Fighters yang telah diupload peserta
    $data = file_get_contents(__DIR__ . "/../public/static/uploads/" . $request['file']);
    $name = $request['name'];
    $handler = fopen(__DIR__ . '/../public/static/top_fighters/' . $name, 'x');
    fwrite($handler, $data);
    fclose($handler);

    header('Location: /');