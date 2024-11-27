<?php
require_once('db.php');

// POSTリクエストがある場合のみ処理を実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームから送信された値を取得
    $itemName = $_POST['itemName'] ?? '';
    $id = $_POST['id'] ?? null;

    // 削除ボタンが押された場合
    if (isset($_POST['delete']) && $id) {
        // データベースから削除
        $stmt = $pdo->prepare("DELETE FROM items WHERE ID = :id");
        $stmt->execute(['id' => $id]);

        // list.php にリダイレクト
        header('Location: list.php');
        exit;
    }

    // 入力が空の場合はリダイレクト
    if (trim($itemName) === '') {
        header('Location: new.php');
        exit;
    }

    // 更新ボタンが押された場合
    if (isset($_POST['update']) && $id) {
        // データベースを更新
        $stmt = $pdo->prepare("UPDATE items SET name = :name WHERE ID = :id");
        $stmt->execute(['name' => $itemName, 'id' => $id]);

        // list.php にリダイレクト
        header('Location: list.php');
        exit;
    }

    // 新規作成の場合
    $stmt = $pdo->prepare("INSERT INTO items (name) VALUES (:name)");
    $stmt->execute(['name' => $itemName]);

    // list.php にリダイレクト
    header('Location: list.php');
    exit;
}

// POSTリクエストでない場合はトップページへリダイレクト
header('Location: list.php');
exit;
