---
title: $a &= $b
teaser: "Binary and assignment"
category: bitwise
tags: ["&="]
related: ["binary-and", "binary-or-assignment", "binary-xor-assignment"]
---

Apply a binary "and" operation and assign the first variable to the result.

```php
// Binary representation: 1100
$a = 12; 

// Binary representation: 1010
$b = 10; 

// Binary result: 1000
// 1 AND 1 = 1
// 1 AND 0 = 0
// 0 AND 1 = 0
// 0 AND 0 = 0
$a &= $b; 
```
