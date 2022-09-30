# 25sprout take home project

## 資料庫結構

五大Entity及自行定義的關聯圖如下
![資料庫結構](/pics/DB_structure.png)

## 資料

`php artisan migrate`建立Table
`php artisan db:seed`會生出測試API所需的所有假資料

## API

所有開立的API如下
![APIs](/pics/APIs.jpg)

### JWT登入

POST以下JSON至`/api/auth/login`
```json
{
    "email": "test@custom.com",
    "password": "password"
}
```
成功登入會回傳範例如下
```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpX",
    "token_type": "bearer",
    "expires_in": 3600
}
```

### 驗證

在呼叫API的headers中加入Authorization並給[JWT登入](#jwt登入)回傳的`access_token`為值

### 建立訂單API

POST如下JSON範例至`/api/newPayment`，其中`id`為`products.id`；`qty`為數量。

(Factory會製作id從1~9的product)
```json
{
    "products" : [
        {"id": 6, "qty": 3},
        {"id": 3, "qty": 6},
        {"id": 4, "qty": 7},
        {"id": 8, "qty": 2}
    ]
}
```

### 訂單細節API

POST至`/api/payment/`並加入訂單ID(`payment.id`)

會回傳`with`購買者及所有訂單細節的資訊
