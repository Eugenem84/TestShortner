<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Сократитель ссылок</title>
</head>
<body>
<h1>Сократитель ссылок</h1>
<form id="shortenForm">
    <label for="originalUrl">Оригинальная ссылка:</label>
    <input type="text" name="originalUrl" id="originalUrl" required>
    <button type="button" class="btn btn-primary" onclick="shortenUrl()">Сократить</button>
</form>

<br>

<div id="result">
    Короткая ссылка:
    <br>
    <textarea id="resultContainer" readonly rows="1" cols="50"></textarea>
</div>

<script src="js/script.js"></script>
</body>
</html>

