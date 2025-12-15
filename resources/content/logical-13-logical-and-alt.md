---
title: $a and $b
teaser: "Alternative logical and"
category: logical
tags: ["and", "&&"]
related: ["logical-and", "logical-or", "logical-not"]
---

Check if both conditions are truthy.

Note: it has a lower precedence than the `&&` operator.

```php
true and true;  // true
true and false; // false

1 and 'a';      // true
0 and '';       // false

// This assigns 13 to $foo
$foo = 13 and 42;

// Equivalent:
// ($foo = 13) and 42;

// compared to
// $foo = 13 && 42;
// which assigns true to $foo
```
