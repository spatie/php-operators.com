---
title: +$a
teaser: "Positive Number Conversion"
category: arithmetic
tags: [+$a, convert]
related: [-$a]
---

When using the `+` operator in front of a variable, that variable will be cast to a number.

```php
$a = '1';
$a = +$a; // 1

$b = '1.2';
$b = +$b; // 1.2
```
