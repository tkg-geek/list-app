<?php
require_once 'db.php';  // DB接続

$requestUri = $_SERVER['REQUEST_URI'];

// ルーティング処理
$requestUri = $_SERVER['REQUEST_URI'];

// ホームページ（リスト表示）
if ($requestUri === '/' || $requestUri === '/index.php') {
    include 'views/list.php';
    exit;
}

// 新規作成ページ
if ($requestUri === '/new') {
    include 'views/new.php';
    exit;
}

// アイテムの作成
if ($requestUri === '/create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['itemName'];
    $stmt = $pdo->prepare("INSERT INTO items (name) VALUES (:name)");
    $stmt->execute([':name' => $itemName]);
    header('Location: /');
    exit;
}

// 編集ページ
if (preg_match('/\/edit\/(\d+)/', $requestUri, $matches)) {
    $id = $matches[1];
    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $item = $stmt->fetch();
    include 'views/edit.php';
    exit;
}

// 更新処理
if (preg_match('/\/update\/(\d+)/', $requestUri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $matches[1];
    $itemName = $_POST['itemName'];
    $stmt = $pdo->prepare("UPDATE items SET name = :name WHERE id = :id");
    $stmt->execute([':name' => $itemName, ':id' => $id]);
    header('Location: /');
    exit;
}

// 削除処理
if (preg_match('/\/delete\/(\d+)/', $requestUri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $matches[1];
    $stmt = $pdo->prepare("DELETE FROM items WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header('Location: /');
    exit;
}

// 404 - ページが見つからない場合
header('HTTP/1.1 404 Not Found');
echo 'ページが見つかりません。';
exit;
?>
