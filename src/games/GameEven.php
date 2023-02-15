<?php

namespace BrainGames\Games\GameEven;

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once (__DIR__ . '/../vendor/autoload.php');
} else {
    require_once (__DIR__ . '/../../vendor/autoload.php');
}

use function BrainGames\Engine\getName;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\getAnswer;
use function cli\line;
use function cli\prompt;

function GameEven()
{
    $name = getName();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $number = getNumber();
        line("Question:{$number}");
        $answer = prompt('Your answer');
        $correct = getAnswer($number);
        if ($answer === $correct) {
            line("Correct!");
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was {$correct}");
            line("Let's try again, %s!", $name);
            exit();
        }; 
    }
    line("Congratulations, %s!", $name);
}