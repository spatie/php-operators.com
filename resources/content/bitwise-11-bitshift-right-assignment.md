---
title: $a >>= $b
teaser: "Bitshift right assignment"
category: bitwise
tags: [">>="]
related: ["bitshift-right", "bitshift-left-assignment"]
---

Apply a binary "bitshift right" operation and assign the first variable to the result.

```php
// Binary representation: 00010100
$a = 20; 

// Binary result: 00000101
$a >> 2; 

// $a is also updated to binary result 00000101
$a;
```
