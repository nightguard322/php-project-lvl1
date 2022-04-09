<?php
namespace Brain\Games\Engine;
use function cli\line;
use function cli\prompt;

function gameEngine(string $name, string | int $question, string | int $answer): void
{
    showMessage("Question {$question}"); //3 + 2
    $message = showUserField("Your answer");
    if ((string)$message === (string)$answer) {
        showMessage("Correct!");
    } else {
        exit("'{$message}' is wrong answer ;(. Correct answer was '{$answer}'\nLet's try again, {$name}!.");
    }
}

function showUserField($message)
{
    return \cli\prompt($message);
}
function showMessage($message)
{
    return \cli\line($message);
}
