<?php

namespace BrainGames\Engine;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function getName()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s', $name);
    return $name;
}

function isEven(int $number)
{
    if ($number % 2 === 0) {
        return true;
    }
    return false;
}

function getAnswer(int $number): string
{
    if (isEven($number)) {
        return "yes";
    }
    return "no";
}

function getNumber(): int
{
    return mt_rand(0, 999);
}

