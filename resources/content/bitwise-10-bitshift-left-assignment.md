---
title: $a <<= $b
teaser: "Bitshift left assignment"
category: bitwise
tags: ["<<="]
related: ["bitshift-left", "bitshift-right-assignment"]
---

This operator shift the bits of the first operand to the left by the number of positions specified in the second operand.

Additionally, the value of the first operand is updated with the result of the operation.

```php
// Binary representation of 5: 00000101
$a = 5; 

// returns binary result: 00010100
$a <<= 2;

// $a is also updated to binary result 00010100
$a;
```
