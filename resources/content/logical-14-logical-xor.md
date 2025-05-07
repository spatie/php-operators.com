---
title: $a xor $b
teaser: "Logical xor"
category: logical
tags: [xor]
related: ["logical-and", "logical-or", "logical-not"]
---

Check if only one of the conditions is truthy.

```php
true xor false;  // true
false xor true;  // true
true xor true;   // false
false xor false; // false

1 xor 0;         // true
1 xor '1';       // false
0 xor '';        // false
```
