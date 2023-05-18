<?php

$data = 
<<<'EOD'
X, -9\\\10\100\-5\\\0\\\\, A
Y, \\13\\1\, B
Z, \\\5\\\-3\\2\\\800, C
EOD;

$lines = explode("\n", trim($data));
$output = array();

foreach ($lines as $line) {
    $parts = explode(",", $line);
    $key = trim($parts[0]);
    $values = explode("\\", trim($parts[1]));

    foreach ($values as $index => $value) {
        if ($value !== '') {
            $output[] = $key . ', ' . $value . ', ' . trim($parts[2]) . ', ' . ($index + 1);
        }
    }
}

sort($output);
foreach ($output as $line) {
    echo $line . "<br>";
}

?>