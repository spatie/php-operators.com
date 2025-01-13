---
title: $a &= $b
teaser: "Binary and operator"
category: bitwise
tags: ["&="]
related: ["binary-and", "binary-or-assignment", "binary-xor-assignment"]
---

The bitwise and operator compares each bit of a and b. 

If both bits are 1, the corresponding result bit is set to 1. Otherwise, the result bit is set to 0.

```php
// Binary representation: 1100
$a = 12; 

// Binary representation: 1010
$b = 10; 

/*
 * Binary result: 1000 because
 * - 1 AND 1 = 1
 * - 1 AND 0 = 0
 * - 0 AND 1 = 0
 * - 0 AND 0 = 0
*/
$a &= $b; 
```
