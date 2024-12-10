---
title: $a || $b
teaser: "Logical or"
category: comparison
tags: ["||", comparison, logical, or]
related: ["or"]
---

```php
true || false; // true
false || false; // false
```

Also works with truthy and falsy values:

```php
1 || 0; // true
0 || ''; // false
```
