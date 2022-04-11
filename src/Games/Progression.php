<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine;

function gameProgression($name)
{
    $task = 'What number is missing in the progression?';
    \Brain\Games\Engine\showMessage($task);
    for ($i = 0; $i < 3; $i++) {
        $question = makeExpression();
        $answer = giveAnswer($question);
        \Brain\Games\Engine\gameEngine($name, (string)$question, (string)$answer);
    }
    \Brain\Games\Engine\showMessage("Congratulations, {$name}!");
}

function makeExpression(): string
{
    $progressionStart = getNumber(0, 100);
    $progressionLength = getNumber(5, 10);
    $emptySlot = getNumber(0, $progressionLength);
    $progression = [];
    for ($i = 0; $i < $progressionLength; $i++) {
        if ($i === $emptySlot) {
            $progression[] = '..';
        } else {
            $progression[] = $progressionStart;
        }
        $progressionStart += 2;
    }
    return implode(' ', $progression);
}

function giveAnswer($expression): int
{
    $expression = explode(' ', $expression);
    $emptySlot = array_search('..', $expression, true);
    $nextSlot = $expression[$emptySlot + 1];
    $prevSlot = $expression[$emptySlot - 1];
    return array_key_exists($nextSlot, $expression) ? $nextSlot - 2 : $prevSlot + 2;
}

function getNumber($start = 1, $end = 9): int
{
    return mt_rand($start, $end);
}

function checkNull($num): bool
{
    if ($num === 0) {
        return false;
    }
    return true;
}
