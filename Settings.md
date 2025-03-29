# home_app

home_app は、XAMPP を使用して Laravel で開発し、Node.js と Laravel Breeze を活用したシンプルなウェブアプリケーションです。

## 目次

-   [必要なツール](#必要なツール)
-   [インストール手順](#インストール手順)
-   [本番環境](#本番環境)

## 必要なツール

-   **XAMPP**: [公式サイト](https://www.apachefriends.org/jp/download.html)からダウンロード
-   **Composer**: [公式サイト](https://getcomposer.org/doc/00-intro.md#installation-windows)からダウンロード
-   **Node.js**: [公式サイト](https://nodejs.org/en/)からダウンロード
-   **PHP**: Laravel に推奨される PHP バージョンをインストール（通常は 8.x）

## インストール手順

1. **XAMPP のインストール**

    - XAMPP をダウンロードし、インストールします。
    - XAMPP を起動し、Apache と MySQL を開始します。

2. **composer インストール**

    composer をダウンロードし、インストールします。

    https://weblabo.oscasierra.net/php-composer-windows-install/ 参照

3. **node.js インストール**
   node.js をダウンロードし、インストールします。

4. **プロジェクトディレクトリに移動**

```bash
  cd C:\xampp\htdocs
  mkdir home_app
  cd home_app
  git clone https://github.com/ManaYashiro/home_app.git .
```

5. **Project Package のインストール**

```bash
  composer install
  npm install
```

6. **依存関係のビルド**

```bash
  npm run dev
  cp .env.example .env
```

7. **ファイルの書き換え**
   DB に detabase utf8mb4_general_ci を作成

```.env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=database
  DB_USERNAME=root
  DB_PASSWORD=
```

8. **マイグレーションの実行**

```bash
  php artisan migrate
```

9. **laravel app key && storage link**

```bash
  php artisan key:generate
  php artisan storage:link
```

.env の APP_URL 変更

```.env
  http://home.app.local
```

10. **apache virtualhost**
    C:\xampp\apache\conf\extra の httpd-vhosts.conf に追記

```httpd-vhosts.conf
  # HOME APP
  <VirtualHost *:80>
      ServerAdmin webmaster@dummy-host.example.com
      DocumentRoot "C:\xampp\htdocs\home_app\public"
      ServerName home.app.local
      <Directory "C:\xampp\htdocs\home_app\public">
          Options Indexes FollowSymLinks
          AllowOverride All
          Require all granted
      </Directory>
      ErrorLog "logs/home-error.log"
      CustomLog "logs/home-access.log" common
      ErrorDocument 503 /503.html
  </VirtualHost>
```

11. **windows hosts file を設定**

https://help.coreserver.jp/manual/hosts-win/　参照

C:\windows\system32\drivers\etc\hosts を開いて追記

```httpd-vhosts.conf
  ### XAMPP settings
  127.0.0.1 home.app.local
```

12. **Apache の再起動**
    仮想ホスト設定を反映させるため、Apache を再起動します。

## 本番環境

    PHP, mysql, apache install

    version
    PHP 8.2.*
    mariadb: 10.4.32
    apache 2.4.58

手順はほぼ同じ

package 追加の場合

```bash
  composer install
  npm install
```

db 変更

```bash
  php artisan migrate
```

cache する

```bash
  php artisan optimize
```

asset build する

```bash
  npm run build
```
