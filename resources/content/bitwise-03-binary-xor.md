---
title: $a ^ $b
teaser: "Binary xor"
category: bitwise
tags: ["^"]
related: ["binary-xor-assignment", "binary-and", "binary-or", "binary-not"]
---

Binary "xor" operation.

```php
$a = 0b01;
$b = 0b01;
$c = 0b10;
$d = 0b11;

var_dump($a ^ $b); // 0b00, 0
var_dump($b ^ $c); // 0b11, 3
var_dump($a ^ $d); // 0b10, 2
var_dump($c ^ $d); // 0b01, 1
```
