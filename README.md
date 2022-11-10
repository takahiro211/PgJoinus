# About PGJoinUs (API)

https://pgjoinus.com

GitHub プロジェクトを共有できる掲示板 SNS サイトです。\
参加し易い OSS プロジェクトを見つけられます。\
リポジトリ管理者は PGJoinUs でプロジェクトを共有することで、\
プログラマーからの contribution を期待できます。\
\
また、PWA として端末にインストール可能です。

[フロント側のリポジトリはこちら](https://github.com/takahiro211/pg-joinus-front)

## ローカル開発環境 Installation

### Docker をインストール

Docker をインストールして起動してください。

### プロジェクトを clone・インストール

・当リポジトリをローカル PC の WorkSpace に`clone`してください。

・プロジェクトのルート(先頭)で以下のコマンドを実行してください。

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

・`.env` ファイルを作成\
以下のコマンドを実行後、適宜修正してください。

`cp .env.example .env`

### ルートで sail を起動

プロジェクトのルート(先頭)で以下のコマンドを実行しコンテナを起動します。

`./vendor/bin/sail up -d`

### key generate

`./vendor/bin/sail artisan key:generate`

### migrate

`./vendor/bin/sail artisan migrate`

### (初回)データベースに初回データを import

以下の SQL ファイルを実行しコンテナの DB に データを import してください。

`.sql`
