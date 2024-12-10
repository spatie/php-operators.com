---
title: -$a
teaser: "Negative Number Conversion"
category: arithmetic
tags: [-$a, convert, invert]
related: [+$a]
---

When using the `-` operator in front of a variable, that variable will be cast to a number and it's sign will be inverted.

```php
$a = '1';
$a = -$a; // -1

$b = '1.2';
$b = -$b; // -1.2

$c = -4;
$c = -$c; // 4
```
