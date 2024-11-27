<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規作成</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<header>
    <a href="/" class="header-logo">LIST APP</a>
</header>
<div class="container">
    <div class="container-header">
        <h1>買い物リスト作成</h1>
    </div>
    <div class="item-form-wrapper">
        <form action="/create" method="post">
            <p class="form-label">買うもの</p>
            <input type="text" name="itemName">
            <input type="submit" value="作成する">
        </form>
    </div>
    <a href="/" class="cancel-button">もどる</a>
</div>
</body>
</html>