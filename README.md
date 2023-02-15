# 汇付天下 SDK for PHP  !

### 主要新特性

* 汇付天下 SDK for PHP
* 在官网sdk基础上转变composer依赖自动加载形式
* 在官网sdk代码基础上，规范代码符合sonarLint检测
* 官网sdk init 加载不同配置等，优化加载内容，提高性能
* 官网sdk crul请求相对复杂，转换guzzle统一请求
* 可执行单元测试
* 简化使用方式、更符合面向对象、命名空间使用规范

### 更新日志

- 1.0.0 优化官网sdk，增加【查询余额】接口
- 1.0.1 降低guzzle版本，兼容老项目

### 更新计划

- 完善常用接口

## 安装

> 运行环境要求PHP7.1+。

```shell
$ composer require cccdl/yunxin_sdk
```

### 接口对应文件

| 文件                | 方法          | 说明   |
|-------------------|-------------|------|
| SettleAccount.php | `balance()` | 查询余额 |

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
$service = new SettleAccount($config);
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
