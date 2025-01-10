---
title: "!$a"
teaser: "Logical not"
category: comparison
tags: ["!", comparison, logical, not]
related: ["logical-and", "logical-or"]
---

```php
$a = true;

!$a; // false

$b = false;

!$b; // true

// Also works with truthy and falsy values:
1 || 0; // true
0 || ''; // false
```
