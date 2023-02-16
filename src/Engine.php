<?php

namespace BrainGames\Engine;

require_once __DIR__ . '/../vendor/autoload.php';

use function BrainGames\Cli\makeHello;
use function BrainGames\Games\GameCalc\getAnswer;
use function cli\line;
use function cli\prompt;

function runGame(string $name, mixed $question, mixed $correct)
{
    line("Question:{$question}");
    $answer = prompt('Your answer');
    if ($answer === (string) $correct) {
        line("Correct!");
    } else {
        line("{$answer} is wrong answer ;(. Correct answer was {$correct}");
        line("Let's try again, %s!", $name);
        exit();
    }; 
}






