<?php

namespace BrainGames\Games\GameProgression;

use function BrainGames\Cli\makeHello;
use function cli\line;
use function BrainGames\Engine\runGame;

function GameProgression()
{
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require_once(__DIR__ . '/../vendor/autoload.php');
    } else {
        require_once(__DIR__ . '/../../vendor/autoload.php');
    }
    $name = makeHello();
    line('What number is missing in the progression?');
    for ($i = 0; $i < 3; $i++) {
        $gameData = getQuestion();
        runGame($name, $gameData);
    }
    line("Congratulations, %s!", $name);
}

function getNumber(): int
{
    return mt_rand(0, 99);
}

function makeProgression()
{
    $start = getNumber();
    $diff = mt_rand(1, 10);
    $length = mt_rand(5, 10);
    $result = [$start];
    for ($i = 0; $i < $length; $i++) {
        $start += $diff;
        $result[] = $start;
    }
    return $result;
}

function getQuestion()
{
    $data = makeProgression();
    $questionKey = array_rand($data);
    $answer = $data[$questionKey];
    $data[$questionKey] = '..';
    $question =  implode(' ', $data);
    return ['question' => "{$question}", 'answer' => $answer];
}
