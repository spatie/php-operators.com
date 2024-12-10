---
title: $a <= $b
teaser: "Less than or equal"
category: comparison
tags: ["<=", less, than, equal]
related: ["<", ">="]
---

```php
2 <= 3; // true
2 <= 2; // true
```

This comparison uses loose type checks and juggles types:

```php
2 <= 2.0; // true
2 <= '2'; // true
```
