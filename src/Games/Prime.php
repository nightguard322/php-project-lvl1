<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine;

function gamePrime($name)
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';
    \Brain\Games\Engine\showMessage($task);
    for ($i = 0; $i < 3; $i++) {
        $question = makeExpression();
        $answer = giveAnswer($question);
        \Brain\Games\Engine\gameEngine($name, $question, $answer);
    }
    \Brain\Games\Engine\showMessage("Congratulations, {$name}!");
}

function makeExpression()
{
    return getNumber();
}

function isPrime($num): bool
{
    for ($i = 2; $i <= 9; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
function giveAnswer($num)
{
    if (isPrime($num)) {
        return "yes";
    }
    return "no";
}
function getNumber(): int
{
    return mt_rand(1, 100);
}
