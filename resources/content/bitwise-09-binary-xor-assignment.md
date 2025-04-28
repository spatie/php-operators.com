---
title: $a ^= $b
teaser: "Binary xor assignment"
category: bitwise
tags: ["^="]
related: ["binary-xor", "binary-and-assignment", "binary-or-assignment"]
---

Apply a binary "xor" operation and assign the first variable to the result.

```php
// Binary representation: 1100
$a = 12; 

// Binary representation: 1010
$b = 10; 

// Binary representation 0110:
// 1 XOR 1 = 0
// 1 XOR 0 = 1
// 0 XOR 1 = 1
// 0 XOR 0 = 0
$a ^= $b;
```
