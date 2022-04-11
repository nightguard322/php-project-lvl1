<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function gameEngine($name, $question, $correctAnswer): void
{
    showMessage("Question {$question}"); //3 + 2
    $answer = showUserField("Your answer");
    if (isCorrect($answer, $correctAnswer)) {
        showMessage("Correct!");
    } else {
        exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'\nLet's try again, {$name}!.");
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
function isCorrect($answer, $correctAnswer)
{
    if ((string)$answer === (string)$correctAnswer) {
        return true;
    }
    return false;
}
