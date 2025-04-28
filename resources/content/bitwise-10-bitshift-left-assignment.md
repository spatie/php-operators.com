---
title: $a <<= $b
teaser: "Bitshift left assignment"
category: bitwise
tags: ["<<="]
related: ["bitshift-left", "bitshift-right-assignment"]
---

Apply a binary "bitshift left" operation and assign the first variable to the result.

```php
// Binary representation of 5: 00000101
$a = 5; 

// returns binary result: 00010100
$a <<= 2;

// $a is also updated to binary result 00010100
$a;
```
