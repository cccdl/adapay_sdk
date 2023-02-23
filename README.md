# 汇付天下 SDK for PHP  !

### 主要新特性

* 汇付天下 SDK for PHP
* 在官网sdk基础上转变composer依赖自动加载形式
* 在官网sdk代码基础上，规范代码符合sonarLint检测
* 官网sdk init 加载不同配置等，优化加载内容，提高性能
* 官网sdk crul请求相对复杂，转换guzzle统一请求
* 可执行单元测试
* 简化使用方式、更符合面向对象、命名空间使用规范
* 错误、成功都统一返回正常可用数组

### 更新日志

- 1.0.0 优化官网sdk，增加【查询余额】接口
- 1.0.1 降低guzzle版本，兼容老项目
- 1.0.2 兼容php7.3版本
- 1.1.0 增加【查询用户对象】接口
- 1.2.0 增加【创建用户对象】接口、优化返回结果，统一返回数组
- 2.0.0 解耦配置文件、方便多次调用
- 2.1.0 增加【创建结算账户对象】【查询结算账户对象】【删除结算账户对象】接口
- 2.2.0 增加【创建退款对象】【查询退款对象】【创建支付确认对象】【查询支付确认对象】【查询支付确认对象列表】【创建支付撤销对象】【查询支付撤销对象】【查询支付撤销对象列表】接口
- 2.3.0 增加【创建支付对象】接口
- 2.4.0 增加【查询支付对象】【查询支付对象列表】【创建支付关单】接口

### 更新计划

- 完善常用接口

## 安装

> 运行环境要求PHP7.1+。

```shell
$ composer require cccdl/yunxin_sdk
```

### 接口对应文件

了解[接口参数](https://docs.adapay.tech/api/apipath.html#)，点击快速进入

| 文件                  | 方法            | 说明         |
|---------------------|---------------|------------|
| SettleAccount.php   | `balance()`   | 查询余额       |
| SettleAccount.php   | `query()`     | 查询结算账户对象   |
| SettleAccount.php   | `create()`    | 创建结算账户对象   |
| SettleAccount.php   | `delete()`    | 删除结算账户对象   |
| Member.php          | `query()`     | 查询用户对象     |
| Member.php          | `create()`    | 创建用户对象     |
| PaymentReverse.php  | `create()`    | 创建支付撤销对象   |
| PaymentReverse.php  | `query()`     | 查询支付撤销对象   |
| PaymentReverse.php  | `queryList()` | 查询支付撤销对象列表 |
| PaymentsConfirm.php | `query()`     | 查询支付确认对象   |
| PaymentsConfirm.php | `queryList()` | 查询支付确认对象列表 |
| PaymentsConfirm.php | `create()`    | 创建支付确认对象   |
| Refund.php          | `create()`    | 创建退款对象     |
| Refund.php          | `query()`     | 查询退款对象     |
| Payment.php         | `create()`    | 创建支付对象     |
| Payment.php         | `query()`     | 查询支付对象     |
| Payment.php         | `queryList()` | 查询支付对象列表   |
| Payment.php         | `close()`     | 创建支付关单     |

### 快速使用

了解汇付天下[接口约定](https://docs.adapay.tech/api/apipath.html#)。

```php
<?php

use cccdl\adapay\Settle\SettleAccount;;
//请求数组
$params = [
    'app_id' => 'app_id',
    'member_id' => 0,
];
//配置数组
$config = [

];
$adapayConfig = new AdapayConfig($config);
$service = new SettleAccount($adapayConfig);
$res = $service->balance($params);
//结果
var_dump($res);
```

## 文档

[接口约定](https://docs.adapay.tech/api/apipath.html#)
[API 文档](https://docs.adapay.tech/api/index.html)
[官网](https://www.adapay.tech/)

## 问题

[提交 Issue](https://github.com/cccdl/adapay_sdk/issues)，不符合指南的问题可能会立即关闭。

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/cccdl/adapay_sdk/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/cccdl/adapay_sdk/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and
PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
