# sample-laravel-subquery

Laravelでsubqueryを使うサンプル

## 使い方

### 1. リポジトリのクローン

```bash
git clone [リポジトリURL]
```

### 2. プロジェクトのセットアップ

```bash
cd src
composer install
```

### 3. マイグレーション

```bash
cd src
php artisan migrate:fresh --seed
```

### 4. 起動

```bash
cd src
php artisan serve
```

## クエリの利用検証

tinker 機能を使って検証する

```bash
# tinker を起動する
cd src
php artisan tinker
```

tinker 上で Usecase を実行する

```php
use Packages\ProductList\Usecase\Query\ProductListQuery;
use Packages\ProductList\Usecase\ProductListSearchUsecase;
$usecase = new ProductListSearchUsecase(new ProductListQuery());
$usecase->exec();
```

## プロジェクトの初期セットアップ

### 1. Laravelプロジェクトの作成

Laravelプロジェクトを作成します。

```bash
# Laravel インストーラーのインストール
composer global require laravel/installer

# Laravelプロジェクトの作成
laravel new src
cd src
```

### 2. マイグレーション

マイグレーションを実行します。

```bash
cd src
php artisan migrate
```

### 3. IDE Helper と Debugbar のインストール

```bash
composer require --dev barryvdh/laravel-ide-helper barryvdh/laravel-debugbar
```

* IDE Helper の設定

```bash
cd src
php artisan ide-helper:generate
php artisan ide-helper:models --nowrite
```
