# qoo10-sdk
Qoo10へのアクセスに利用するSDKです。

## 参考元

[Qoo10 API Developer's Guide](https://api.qoo10.jp/GMKT.INC.Front.QAPIService/Document/QAPIGuideIndex.aspx)

基本的にQoo10のAPIはPOSTでもGETでも利用可能なものが多いですが、現在は両方とも空いている場合はPOST通信を優先的に利用するようにしています。

## 将来的なアップデート予定

- ConfigにPOST通信・GET通信のどちらを優先して利用するかの設定の追加
- Monolog対応