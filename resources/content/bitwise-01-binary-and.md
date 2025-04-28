---
title: $a & $b
teaser: "Binary and"
category: bitwise
tags: ["&"]
related: ["binary-and-assignment", "binary-or", "binary-xor", "binary-not"]
---

Binary "and" operation.

```php
$a = 0b01;
$b = 0b01;
$c = 0b10;
$d = 0b11;

var_dump($a & $b); // 0b01, 1
var_dump($b & $c); // 0b00, 0
var_dump($a & $d); // 0b01, 1
var_dump($c & $d); // 0b10, 2
```
