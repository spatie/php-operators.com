---
title: $a ??= $b
teaser: "Null coalescing assignment operator"
category: null coalescing
tags: ["??="]
related: ["null-coalescing"]
---

Reassign the left variable to a value if it's unset or null.

```php
$name = null;
$name ??= 'Mark'; // Mark

$name = 'Irving';
$name ??= 'Mark'; // Irving
```
