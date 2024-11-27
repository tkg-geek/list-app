<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../db.php';

$stmt = $pdo->query("SELECT * FROM items");
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LIST APP</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<header>
    <a class="header-logo" href="/">LIST APP</a>
</header>
<div class="container">
    <div class="container-header">
        <h1>買い物リスト</h1>
        <a href="new.php" class="new-button">+ 新規作成</a>
    </div>
    <div class="index-table-wrapper">
        <div class="table-head">
            <span class="id-column">ID</span>
            <span>買うもの</span>
        </div>
        <ul class="table-body">
            <?php foreach ($items as $item): ?>
            <li>
                <div class="item-data">
                    <span class="id-column"><?= htmlspecialchars($item['id']) ?></span>
                    <span class="name-column"><?= htmlspecialchars($item['name']) ?></span>
                </div>
                <div class="item-menu">
                    <form action="/delete/<?= $item['id'] ?>" method="post">
                        <input type="submit" value="削除">
                    </form>
                    <a href="/edit/<?= $item['id'] ?>">編集</a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>
