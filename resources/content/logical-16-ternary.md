---
title: "$a ? $b : $c"
teaser: "Ternary operator"
category: logical
tags: ["?:", ternary]
related: ["null-coalescing"]
---

Does a truthy check on a value, returns the value to the left of `:` if true, returns the value to the right of `:` if false.

```php
true ? 'Yes' : 'No';  // "Yes"
false ? 'Yes' : 'No'; // "No"
```
