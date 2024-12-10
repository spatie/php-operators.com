---
title: $a > $b
teaser: "Greater than"
category: comparison
tags: [">", greater, than]
related: [">=", "<"]
---

```php
3 > 2; // true
```

This comparison uses loose type checks and juggles types:

```php
2 > 2.0; // false
2 > '2'; // false
```
