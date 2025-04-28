---
title: $a xor $b
teaser: "Logical xor"
category: comparison
tags: [xor, comparison, logical]
related: ["logical-and", "logical-or", "logical-not"]
---

Check if one of the conditions is truthy.

```php
true xor false;  // true
false xor true;  // true
true xor true;   // false
false xor false; // false

1 xor 0;         // true
1 xor '1';       // false
0 xor '';        // false
```
