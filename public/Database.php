<?php
// База данных
class Database
{
    private static $pdo;

    // Соединение
    public static function connect()
    {
        try {
            self::$pdo = new PDO("pgsql:host=db;port=5432;dbname=db_links_shortner", "root", "root");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }
    //добавление короткой ссылки в базу
    public static function addShortenedUrl($originalUrl, $shortUrl)
    {
        try {
            $stmt = self::$pdo->prepare("INSERT INTO links (original_url, short_url ) VALUES (:originalUrl, :shortUrl)");

            $stmt->bindParam(':originalUrl', $originalUrl);
            $stmt->bindParam(':shortUrl', $shortUrl);

            $stmt->execute();
        } catch (PDOException $e){
            die("<br>ошибка добавления в базу данных: " . $e->getMessage());
        }
    }
    // получение оригинальной ссылки по короткой
    public static function getOriginalUrl($shortUrl)
    {
        try {
            $stmt = self::$pdo->prepare("SELECT original_url FROM links WHERE short_url = :shortUrl");
            $stmt->bindParam(':shortUrl', $shortUrl);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return($result !== false) ? $result['original_url'] : null;

        } catch (PDOException $e) {
            die("Ошибка при получении длинной ссылки из базы данных: " . $e->getMessage());
        }
    }
}