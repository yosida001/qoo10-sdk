# qoo10-sdk
Qoo10へのアクセスに利用するSDKです。

![tests](https://github.com/yosida001/qoo10-sdk/actions/workflows/tests.yml/badge.svg)

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
