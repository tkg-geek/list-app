<?php
ini_set('display_errors', 0);
error_reporting(0);



require_once('db.php');

$stmt = $pdo->query("SELECT * FROM items");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>LIST APP</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <a class="header-logo" href="index.php">LIST APP</a>
    </header>
    <div class="container">
        <div class="container-header">
            <h1>やることリスト</h1>
            <a href="new.php" class="new-button">+ 新規作成</a>
        </div>
        <div class="index-table-wrapper">
            <div class="table-head">
                <span class="id-column">ID</span>
                <span>リスト</span>
            </div>
            <ul class="table-body">
                <?php foreach ($items as $item): ?>
                    <li>
                        <div class="item-data">
                            <span class="id-column"><?= htmlspecialchars($item['ID']) ?></span>
                            <span class="name-column"><?= htmlspecialchars($item['name']) ?></span>
                        </div>
                        <div class="item-menu">
                            <form action="app.php" method="post">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($item['ID']) ?>">
                                <input type="hidden" name="delete" value="1">
                                <input type="submit" value="削除">
                            </form>
                            <a href="edit.php?id=<?= $item['ID'] ?>">編集</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>