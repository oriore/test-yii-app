# dockerの起動
```
docker-compose up -d
```

# yiiのインストール
```
1.docker-compose exec app bash
2.cd /var/www/service
3.composer install
```
上記完了後にページが見れるようになるはず

(例)
```
http://localhost:8081/
http://localhost:8081/site/
http://localhost:8081/test/
http://localhost:8081/test/hoge/
```
