<?php
header("Content-type:text/html;charset=utf8");
$config = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => 'root',
    'database' => 'houdunren',
    'charset' => 'utf8'
];
$dsn = sprintf(
    "mysql:host=%s;dbname=%s;charset=%s",
    $config['host'],
    $config['database'],
    $config['charset']
);
try {
    $pdo = new PDO($dsn, $config['user'], $config['password'], [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    $query = $pdo->query('SELECT * FROM news WHERE id>1 LIMIT 2');
    while ($field = $query->fetch()) {
        echo sprintf("标题:%s\t作者:%s<br/>", $field['title'], $field['author']);
    }
} catch (PDOException $e) {
    die("Exception:" . $e->getMessage());
}
