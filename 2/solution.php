<?php

$import = file_get_contents('./2/input.txt');
$lines = explode("\n", $import);

$dial = 50;
$password = 0;
$count = 0;
$maxLines = -1;
echo "Starting... Dial is at $dial \n";

foreach ($lines as $line) {
    if (empty($line)) {
        continue;
    }
    $direction = $line[0];
    $amount = (int) substr($line, 1);
    echo "Dial turned from $dial ";
    switch ($direction) {
        case "L":
            $dial -= $amount;

            break;
        case "R":
            $dial += $amount;

            break;
        default:
            throw new Exception("No direction found");
    }
    if ($dial >= 100) {
        $zeroCount = abs(floor($dial / 100)) - 1;
        $password += $zeroCount;
        $dial %= 100;
    } elseif ($dial < 0) {
        $zeroCount = abs(floor($dial / 100)) - 1;
        $password += $zeroCount;
        $dial = $dial % 100 + 100;
    }
    if ($dial === 0)
        $password++;
    echo "in direction $direction by $amount to $dial\n";
}
echo "Counted zero position $password times";
