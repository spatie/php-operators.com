---
title: "$a <=> $b"
teaser: "Spaceship operator"
category: comparison
tags: ["\<=\>", compare, sort, ufo]
related: ["ternary", "less-than", "greater-than", "loose-equality"]
---

Returns `0` if the values both sides equal, `1` if the value to the left is greater, `-1` if the value to the right is greater. The spaceship operator does a loose check on values.

```php
1 <=> 1; // 0
2 <=> 1; // 1
1 <=> 2; // -1
```
