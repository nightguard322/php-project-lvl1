<?php

namespace BrainGames\Games\GameGcd;

use function BrainGames\Cli\makeHello;
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

function gameGcd()
{
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require_once(__DIR__ . '/../vendor/autoload.php');
    } else {
        require_once(__DIR__ . '/../../vendor/autoload.php');
    }
    $name = makeHello();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < 3; $i++) {
        $question = getQuestion(getData());
        $answer = getAnswer($question);
        runGame($name, $question, $answer);
    }
    line("Congratulations, %s!", $name);
}

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
    return "{$firstNum} {$secoundNum}";
}

function getAnswer(string $question)
{
    $data = explode(' ', $question);
    [$firstNum, $secoundNum] = $data;
    return calc([$firstNum, $secoundNum]);
}
