<?php
header('Content-Type: application/json');
include 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $shortURL = rtrim($_SERVER['REQUEST_URI'], '/');

    $shortURL = 'http://localhost:8876' . $shortURL;

    if (!empty($shortURL)) {

        Database::connect();
        $originalUrl = Database::getOriginalUrl($shortURL);

        if (!empty($originalUrl)){
            //var_dump($originalUrl);
            //перенаправление на длинную ссылку
            header("Location: $originalUrl", true, 301);
            exit();
        } else {
            var_dump($shortURL);
            var_dump($originalUrl);
            echo 'короткой ссылки нет в базе ,';
            header("HTTP/1.0 404 Not Found");
            exit();
        }
    } else {
        echo 'неправильная короткая ссылка';
    }
} else {
    http_response_code(405);
    echo 'метод не разрешен';
}