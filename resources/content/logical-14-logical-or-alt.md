---
title: $a or $b
teaser: "Alternative logical or"
category: logical
tags: ["or", "||"]
related: ["logical-and", "logical-or", "logical-not"]
---

Check if any condition is truthy.

Note: it has a lower precedence than the `||` operator.

```php
true or false;  // true
false or false; // false

1 or 0;         // true
0 or '';        // false

// This assigns false to $foo
$foo = false or true;

// Equivalent:
// ($foo = false) or true;

// compared to
// $foo = false || true;
// which assigns true to $foo
```
