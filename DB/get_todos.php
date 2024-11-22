<?php
$dsn = 'mysql:dbname=;host=;charset=utf8';
$user = '';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    exit('DB接続エラー: ' . $e->getMessage());
}

$date = htmlspecialchars($_POST['date'], ENT_QUOTES, "UTF-8");

$stmt = $pdo->prepare("SELECT * FROM diary_table WHERE dates = :dates ORDER BY times");
$stmt->bindValue(':dates', $date, PDO::PARAM_STR);
$stmt->execute();

$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($todos);
