<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine;

function gameEven($name)
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';
    \Brain\Games\Engine\showMessage($task);
    for ($i = 0; $i < 3; $i++) {
        $question = makeExpression();
        $answer = giveAnswer($question);
        \Brain\Games\Engine\gameEngine($name, (string)$question, (string)$answer);
    }
    \Brain\Games\Engine\showMessage("Congratulations, {$name}!");
}

function isEven($num): bool
{
    if ($num % 2 === 0) {
        return true;
    }
    return false;
}

function makeExpression()
{
    return getNumber();
}

function giveAnswer($num)
{
    if (isEven($num)) {
        return "yes";
    }
    return "no";
}
function getNumber(): int
{
    return mt_rand(1, 100);
}
