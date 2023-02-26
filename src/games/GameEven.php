<?php

namespace BrainGames\Games\GameEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\makeHello;
use function BrainGames\Engine\runGame;

function getQuestion(int $number): array
{
    $answer = isEven($number) ? "yes" : "no";
    return ['question' => $number, 'answer' => $answer];
}

function getNumber(): int
{
    return mt_rand(1, 99);
}

function isEven(int $number)
{
    if ($number % 2 === 0) {
        return true;
    }
    return false;
}

function GameEven()
{
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require_once(__DIR__ . '/../vendor/autoload.php');
    } else {
        require_once(__DIR__ . '/../../vendor/autoload.php');
    }
    $name = makeHello();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        runGame($name, getQuestion(getNumber()));
    }
    line("Congratulations, %s!", $name);
}
