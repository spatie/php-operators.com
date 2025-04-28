---
title: "{$a} {$b}"
teaser: "Interpolation"
category: strings
tags: ["{…}", "{$}", "{}"]
related: ["concatenation"]
---

Echo a variable as a substring of a string. Curly braces are optional. Not support in single-quote strings.

```php
$name = 'Nimrod';
"Hello, $name"; // "Hello, Nimrod!"

$name = 'Pedro';
"Hello, {$name}"; // "Hello, Pedro!"
```
