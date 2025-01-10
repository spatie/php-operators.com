---
title: $a | $b
teaser: "Binary or"
category: bitwise
tags: ["|"]
related: ["binary-or-assignment", "binary-and", "binary-xor", "binary-not"]
---

Binary or

```php
$a = 0b01;
$b = 0b01;
$c = 0b10;
$d = 0b11;

var_dump($a | $b); // 0b01, 1
var_dump($b | $c); // 0b11, 3
var_dump($a | $d); // 0b11, 3
var_dump($c | $d); // 0b11, 3
```
