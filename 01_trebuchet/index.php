<?php
const FILE = './stars.txt';
const NUMBERS_REGEX = '/\D/';
const FIRST_CODE_NUMBER = 0;
const LAST_CODE_NUMBER = -1;

$calibration_values = array();
$lines = file(FILE, FILE_IGNORE_NEW_LINES);
$totalSum = 0;

foreach ($lines as $line) {
    $numbers = preg_replace(NUMBERS_REGEX, '', $line);
    $first_digit = $numbers[FIRST_CODE_NUMBER];
    $last_digit = substr($numbers, LAST_CODE_NUMBER);

    $finalNumberCode = $first_digit . $last_digit;
    $totalSum += intval($finalNumberCode);
}

echo "El código de calibración és: $totalSum";
