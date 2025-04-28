---
title: $a ?? $b
teaser: "Null coalescing operator"
category: null coalescing
tags: ["??"]
related: ["null-coalescing-assignment"]
---

Return the left variable if it's set and not null, otherwise return the right value.

```php
$name = null;
'Hey, ' . ($a ?? 'buddy'); // "Hey, buddy"

// "Hey, Cassian!"
$name = 'Cassian';
'Hey, ' . ($a ?? 'buddy'); // "Hey, Cassian"
```
