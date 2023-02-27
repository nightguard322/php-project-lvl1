<?php

namespace BrainGames\Games\GamePrime;

use function BrainGames\Cli\makeHello;
use function cli\line;
use function BrainGames\Engine\runGame;

function GamePrime()
{
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require_once(__DIR__ . '/../vendor/autoload.php');
    } else {
        require_once(__DIR__ . '/../../vendor/autoload.php');
    }
    $name = makeHello();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        runGame($name, getQuestion(getNumber()));
    }
    line("Congratulations, %s!", $name);
}

function getNumber(): int
{
    return mt_rand(0, 99);
}

function getQuestion(int $number)
{
    $answer = true;
    if (!isPrime($number)) {
        $answer = false;
    }
    return ['question' => $number, 'answer' => getAnswer($answer)];
}

function getAnswer(bool $answer)
{
    if ($answer) {
        return 'yes';
    }
    return 'no';
}
function isPrime(int $number)
{
    if (($number % 2 === 0) || ($number % 3 === 0)) {
        return false;
    }
    $finish = round(sqrt($number));
    for ($i = 2; $i < $finish; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
