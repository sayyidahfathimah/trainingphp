<?php

$data = <<<'EOD'
    X, -9\\\10\100\-5\\\0\\\\, A
    Y, \\13\\1\, B
    Z, \\\5\\\-3\\2\\\800, C
    EOD;

$lines = explode("\n",trim($data));
$data = [];

// echo '<pre>'; print_r($lines); echo '</pre>';

foreach ($lines as $line) {
    $parts = explode(",", $line);
    $key = trim($parts[0]);
    $values = explode("\\", trim($parts[1]));
    $values = array_filter($values, 'strlen');
    foreach ($values as $index => $value) {
        $values[$index] = trim($value);
    }
    $group = trim($parts[2]);
    
    $nomor = 1;
    
    foreach ($values as $value) {
        $data[] = [
            'key' => $key,
            'value' => $value,
            'group' => $group,
            // 'sequence' => count($data) + 1,
            'sequence' => $nomor,
        ];
        $nomor ++;
    }
}

// echo '<pre>'; print_r($data); echo '</pre>';

$keys = array_column($data, 'value');
array_multisort($keys, SORT_ASC, $data);

// Output the sorted data
foreach ($data as $entry) {
    echo $entry['key'] . ', ' . $entry['value'] . ', ' . $entry['group'] . ', ' . $entry['sequence'] . "<br>";
}

?>
