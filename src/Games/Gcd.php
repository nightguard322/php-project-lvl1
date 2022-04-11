<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine;

function gameGcd($name)
{
    $task = 'Find the greatest common divisor of given numbers.';
    \Brain\Games\Engine\showMessage($task);
    for ($i = 0; $i < 3; $i++) {
        $question = makeExpression();
        $answer = giveAnswer($question);
        \Brain\Games\Engine\gameEngine($name, $question, $answer);
    }
    \Brain\Games\Engine\showMessage("Congratulations, {$name}!");
}

function makeExpression(): string
{
    $num1 = getNumber();
    $num2 = getNumber();
    return "{$num1} {$num2}";
}

function giveAnswer($expression): int
{
    $expression = explode(' ', $expression);
    [$dividend, $divisor] = $expression;
    while ($divisor > 0) {
        $temp = $dividend % $divisor;
        $dividend = $divisor;
        $divisor = $temp;
    }
    return $dividend;
}

function getNumber(): int
{
    return mt_rand(1, 9);
}

function checkNull($num): bool
{
    if ($num === 0) {
        return false;
    }
    return true;
}
