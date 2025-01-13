---
title: $a |= $b
teaser: "Binary or operator"
category: bitwise
tags: ["|="]
related: ["binary-or", "binary-and-assignment", "binary-xor-assignment"]
---

The bitwise or operator compares each bit of a and b. 

If either bit is 1, it returns 1. Otherwise, it returns 0.

```php
// Binary representation: 1100
$a = 12; 

// Binary representation: 1010
$b = 10; 

/*
 * Binary result: 1110 because
 * - 1 OR 1 = 1
 * - 1 OR 0 = 1
 * - 0 OR 1 = 1
 * - 0 OR 0 = 0
 */
$a |= $b; 
```
