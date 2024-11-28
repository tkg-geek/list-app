<?php
// GitHub の Webhook イベントを受け取る
// GitHub から送られてくるデータを受け取る
$payload = file_get_contents('php://input');
$payload_data = json_decode($payload, true);

// ここで Webhook が正しく受け取れたことを確認する
if ($payload_data && $payload_data['ref'] === 'refs/heads/main') {
    // push イベントが `main` ブランチからのものであればスクリプトを実行する
    // セキュリティのために、署名などで検証することをおすすめしますが、簡単にするためにチェックを省略します。

    // `deploy.sh` スクリプトを実行
    $output = shell_exec('/bin/bash /var/www/your-repo/deploy.sh');
    echo "Deployment started: " . $output;
} else {
    echo "Invalid payload or branch.";
}
?>
