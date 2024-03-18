<pre>
<?php
echo __FILE__, PHP_EOL;
$env = getenv();
ksort($env);
print_r($env);