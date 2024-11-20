<?php
$dsn = 'mysql:dbname=mearkgp;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    exit('DB接続エラー: ' . $e->getMessage());
}

$detail = htmlspecialchars($_POST['detail'], ENT_QUOTES, "UTF-8");
$dates = htmlspecialchars($_POST['date'], ENT_QUOTES, "UTF-8");
$times = htmlspecialchars($_POST['time'], ENT_QUOTES, "UTF-8");

$stmt = $pdo->prepare("INSERT INTO diary_table (tasks, dates, times) VALUES (:tasks, :dates, :times)");
$stmt->bindValue(':tasks', $detail, PDO::PARAM_STR);
$stmt->bindValue(':dates', $dates, PDO::PARAM_STR);
$stmt->bindValue(':times', $times, PDO::PARAM_STR);
$stmt->execute();

header("Location: ../index.php");
