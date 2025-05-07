---
title: "$a ?: $b"
teaser: "Short ternary operator"
category: logical
tags: ["?:", ternary, elvis]
related: ["null-coalescing"]
---

Does a truthy check on a value, returns the value if true, returns the value to the right if false.

```php
true ?: 'No';  // true
false ?: 'No'; // "No"
```
