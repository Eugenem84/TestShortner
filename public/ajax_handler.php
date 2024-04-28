<?php
header('Content-Type: application/json');
include 'Database.php';
include 'UrlShortener.php';

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $originalUrl = $_POST['originalUrl'];

    try {
        $shortenedUrl = UrlShortener::shorten($originalUrl);
        Database::connect();
        Database::addShortenedUrl($originalUrl, $shortenedUrl);
        echo json_encode($shortenedUrl);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode('метод не разрешен');
}