<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\makeHello;
use function BrainGames\Games\GameCalc\getAnswer;
use function cli\line;
use function cli\prompt;

/**
 * Запуск движка всех игр
 *
 * @param  mixed $name - имя игрока
 * @param  mixed $gameData - данные для игры
 * @return void
 */
function runGame(string $name, array $gameData)
{
    require_once __DIR__ . '/../vendor/autoload.php';
    $question = $gameData['question'];
    line("Question: %s", $question);
    $answer = prompt('Your answer');
    if ($answer === (string) $gameData['answer']) {
        line("Correct!");
    } else {
        line("{$answer} is wrong answer ;(. Correct answer was {$gameData['answer']}");
        line("Let's try again, %s!", $name);
        exit();
    };
}
