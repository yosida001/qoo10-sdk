# qoo10-sdk

Qoo10 Japan API を PHP から利用するためのSDKです。

![tests](https://github.com/yosida001/qoo10-sdk/actions/workflows/tests.yml/badge.svg)

## 必要環境

- PHP 7.2 以上
- Composer

## インストール

```bash
composer require yosida001/qoo10-sdk
```

## 基本的な使い方

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\Qoo10Client;
use Yosida001\Qoo10Sdk\Requests\ItemsLookup\GetItemDetailInfoRequest;

$client = new Qoo10Client(new Config('YOUR_CERTIFICATION_KEY'));

$response = $client->itemsLookup()->getItemDetailInfo(
    new GetItemDetailInfoRequest([
        'ItemCode' => '123456789',
    ])
);
```

デフォルトの戻り値はJSONを連想配列へデコードした値です。XMLで受け取りたい場合は `ReturnType::xml()` を指定します。

```php
use Yosida001\Qoo10Sdk\Config;
use Yosida001\Qoo10Sdk\ValueObjects\ReturnType;

$config = new Config(
    'YOUR_CERTIFICATION_KEY',
    ReturnType::xml(),
    30,
    false,
    'your-app-name',
    'https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi/'
);
```

`baseUri` を省略すると `https://api.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi/` を使います。
`https://www.qoo10.jp/GMKT.INC.Front.QAPIService/ebayjapan.qapi/` のように末尾スラッシュ付きで指定しても、内部で正規化されます。

## 利用できるサービス

`Qoo10Client` から以下のサービスを取得できます。

- `certification()`
- `itemsBasic()`
- `itemsLookup()`
- `itemsOrder()`
- `itemsOptions()`
- `itemsContents()`
- `claim()`
- `commonInfoLookup()`
- `csCenter()`
- `shippingBasic()`

## 例外

HTTP通信やJSONデコードに失敗した場合は `Yosida001\Qoo10Sdk\Exceptions\Qoo10Exception` が送出されます。

## 参考元

[Qoo10 API Developer's Guide](https://api.qoo10.jp/GMKT.INC.Front.QAPIService/Document/QAPIGuideIndex.aspx)

Qoo10 API の仕様をもとに実装しています。

## テスト実行

Docker 上の PHP コンテナから実行します。

```bash
make test
```

初回など `vendor/` がまだ入っていない場合は、先に依存関係を入れます。

```bash
make composer-install
```

## リリース前チェック

```bash
docker compose run --rm php composer validate --strict
docker compose run --rm php vendor/bin/phpunit --configuration phpunit.xml.dist
```
