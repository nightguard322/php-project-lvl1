<?php

namespace BrainGames\Games\GameEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\makeHello;
use function BrainGames\Engine\runGame;

function getAnswer(int $number): string
{
    if (isEven($number)) {
        return "yes";
    }
    return "no";
}

function getNumber(): int
{
    return mt_rand(0, 99);
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
        $question = getNumber();
        $answer = getAnswer($question);
        runGame($name, $question, $answer);
    }
    line("Congratulations, %s!", $name);
}
