---
title: $a <= $b
teaser: "Less than or equal"
category: comparison
tags: ["<=", less, than, equal]
related: ["less-than", "greater-than", "greater-than-or-equal"]
---

```php
2 <= 3; // true
2 <= 2; // true

// This comparison uses loose type checks and juggles types:
2 <= 2.0; // true
2 <= '2'; // true
```
