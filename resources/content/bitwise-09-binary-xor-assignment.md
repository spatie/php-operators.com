---
title: $a ^= $b
teaser: "Binary xor operator"
category: bitwise
tags: ["^="]
related: ["binary-xor", "binary-and-assignment", "binary-or-assignment"]
---

The bitwise or operator compares each bit of a and b. 

If the corresponding bits are different, the result is 1. If the corresponding bits are the same, the result is 0.

```php
// Binary representation: 1100
$a = 12; 

// Binary representation: 1010
$b = 10; 

/*
 * Binary representation: 0110 because
 * - 1 XOR 1 = 0
 * - 1 XOR 0 = 1
 * - 0 XOR 1 = 1
 * - 0 XOR 0 = 0
 */
$a ^= $b;
```
