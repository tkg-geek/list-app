<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規作成</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header>
    <a href="index.php" class="header-logo">LIST APP</a>
</header>
<div class="container">
    <div class="container-header">
        <h1>リスト作成</h1>
    </div>
    <div class="item-form-wrapper">
        <form action="app.php" method="post">
            <p class="form-label">やること</p>
            <input type="text" name="itemName">
            <input type="submit" value="作成する">
        </form>
    </div>
    <a href="list.php" class="cancel-button">もどる</a>
</div>
</body>
</html>