<?php
const FILE_PATH = './input.txt';
const RESULT_MESSAGE = "La suma de todos los valores de calibración es:";
const WORD_TO_DIGIT = [
    'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5,
    'six' => 6, 'seven' => 7, 'eight' => 8, 'nine' => 9
];
const NUMBERS_REGEX = '/\D/';
const FIRST_CODE_NUMBER = 0;
const LAST_CODE_NUMBER = -1;


function getLineNumbers($line)
{
    foreach (WORD_TO_DIGIT as $word => $digit) {
        $newWord = $word[FIRST_CODE_NUMBER] . $digit . $word[LAST_CODE_NUMBER];
        $line = str_replace($word, $newWord, $line);
    }
    return preg_replace(NUMBERS_REGEX, '', $line);
}

function sumTotalCalibrationValues($file)
{
    $lines = file($file);
    $totalSum = 0;

    foreach ($lines as $line) {
        $numbers = getLineNumbers($line);
        $first_digit = $numbers[FIRST_CODE_NUMBER];
        $last_digit = substr($numbers, LAST_CODE_NUMBER);

        $finalNumberCode = $first_digit . $last_digit;
        $totalSum += intval($finalNumberCode);
    }

    return $totalSum;
}

$totalSum = sumTotalCalibrationValues(FILE_PATH);
echo RESULT_MESSAGE . $totalSum;
