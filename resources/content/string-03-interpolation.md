---
title: "{$a} {$b}"
teaser: "Interpolation"
category: strings
tags: ["{…}", "{$}", "{}"]
related: ["concatenation"]
---

Return a variable as a substring of a string. Curly braces are optional. Not supported in single-quoted strings.

```php
$name = 'Nimrod';
"Hello, $name"; // "Hello, Nimrod!"

$name = 'Pedro';
"Hello, {$name}"; // "Hello, Pedro!"
```
