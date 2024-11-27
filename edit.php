<?php
require_once('db.php');

// URLからIDを取得
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "IDが指定されていません。";
    exit;
}

// 指定されたIDのアイテムをデータベースから取得
$stmt = $pdo->prepare("SELECT * FROM items WHERE ID = :id");
$stmt->execute(['id' => $id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    echo "データが見つかりません。";
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header>
    <a href="index.php" class="header-logo">LIST APP</a>
</header>
<div class="container">
    <div class="container-header">
        <h1>リスト編集</h1>
    </div>
    <div class="item-form-wrapper">
        <form action="app.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($item['ID']) ?>">
            <p class="form-label">やること</p>
            <input type="text" name="itemName" value="<?= htmlspecialchars($item['name']) ?>">
            <input type="submit" name="update" value="更新する">
        </form>
    </div>
    <a href="list.php" class="cancel-button">もどる</a>
</div>
</body>
</html>