# LIST─APP
---
![](https://img.shields.io/badge/html-green)
![](https://img.shields.io/badge/css-blue)
![](https://img.shields.io/badge/JavaScript-orange)
![](https://img.shields.io/badge/php-purple)
![](https://img.shields.io/badge/database-red)

# ディレクトリ構成
---
```
/list─app
├── /public
│  └── /css
│      └── style.css
│  └── /images
│      └─── top.png
│── edit.php
│── new.php
│── list.php
│── index.php
├── .env
├── app.php
└── db.php

```


# 課題概要
---
### ① 課題名
LIST APP
### ② 課題内容（どんな作品か）
最低限の機能（新規登録・一覧表示・編集（更新）・削除機能）を盛り込んだメモツール
### ③ アプリのデプロイ URL
https://tkgeek.sakura.ne.jp/list-app/
### ④ アプリのログイン用 ID または Password（ある場合）

### ⑤ 工夫した点・こだわった点
以前Node.jsで制作したものを、PHPに書き換えた。  
ルーティングや処理をすべてapp.phpの1ファイルにまとめた。
本番環境は環境変数を使用。
### ⑥ 難しかった点・次回トライしたいこと（又は機能）

### ⑦ フリー項目（感想、シェアしたいこと等なんでも）
開発環境ブランチと本番環境ブランチと分けて、Gitを使用して開発を進めることができました。