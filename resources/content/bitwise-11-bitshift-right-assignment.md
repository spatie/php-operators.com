---
title: $a >>= $b
teaser: "Bitshift right assignment"
category: bitwise
tags: [">>="]
related: ["bitshift-right", "bitshift-left-assignment"]
---

This operator shift the bits of the first operand to the right by the number of positions specified in the second operand.

Additionally, the value of the first operand is updated with the result of the operation.

```php
// Binary representation: 00010100
$a = 20; 

// Binary result: 00000101
$a >> 2; 

// $a is also updated to binary result 00000101
$a;
```
