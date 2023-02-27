<?php

namespace BrainGames\Games\GameGcd;

use function BrainGames\Cli\makeHello;
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

function calc(array $numbers)
{
    sort($numbers);
    [$max, $min] = $numbers;
    $diff = $max % $min;
    while ($diff > 0) {
        $max = $min;
        $min = $diff;
        $diff = $max % $min;
    }
    return $min;
}

function getNumber(): int
{
    return mt_rand(0, 99);
}

function getData()
{
    $firstNum = getNumber();
    $secoundNum = getNumber();
    while ($secoundNum === 0) {
        $secoundNum = getNumber();
    }
    return [$firstNum, $secoundNum];
}

function getQuestion(array $data)
{
    [$firstNum, $secoundNum] = $data;
    $answer = calc([$firstNum, $secoundNum]);
    return ['question' => "{$firstNum} {$secoundNum}",
            'answer' => $answer];
}

function GameGcd()
{
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require_once(__DIR__ . '/../vendor/autoload.php');
    } else {
        require_once(__DIR__ . '/../../vendor/autoload.php');
    }
    $name = makeHello();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < 3; $i++) {
        $qameData = getQuestion(getData());
        runGame($name, $qameData);
    }
    line("Congratulations, %s!", $name);
}