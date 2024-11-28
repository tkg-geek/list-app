#!/bin/bash

cd /var/www/your-repo || exit
git pull origin main || exit
# 必要に応じて、ビルドやデータベースマイグレーションなどのコマンドを追加
echo "デプロイ完了"