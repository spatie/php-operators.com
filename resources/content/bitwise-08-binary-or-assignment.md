---
title: $a |= $b
teaser: "Binary or assignment"
category: bitwise
tags: ["|="]
related: ["binary-or", "binary-and-assignment", "binary-xor-assignment"]
---

Apply a binary "or" operation and assign the first variable to the result.

```php
// Binary representation: 1100
$a = 12; 

// Binary representation: 1010
$b = 10; 

// Binary result: 1110
// 1 OR 1 = 1
// 1 OR 0 = 1
// 0 OR 1 = 1
// 0 OR 0 = 0
$a |= $b; 
```
