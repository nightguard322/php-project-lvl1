<?php

namespace BrainGames\Games\GameProgression;

use LengthException;

use function BrainGames\Cli\makeHello;
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

function GameProgression()
{
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require_once(__DIR__ . '/../vendor/autoload.php');
    } else {
        require_once(__DIR__ . '/../../vendor/autoload.php');
    }
    $name = makeHello();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < 3; $i++) {
        $question = getQuestion(getNumber());
        $answer = getAnswer($question);
        runGame($name, $question, $answer);
    }
    line("Congratulations, %s!", $name);
}

function getNumber(): int
{
    return mt_rand(0, 99);
}

function makeProgression($data)
{
    $start = getNumber();
    $diff = mt_rand(1, 10);
    $length = mt_rand(1, 10);
    $result = [$start];
    for ($i = 0; $i < $length; $i++) {
        $start += $diff;
        $result[] = $start;
    }
    return $result;
}

function getQuestion(int $number)
{
    $data = makeProgression($number);
    $data[array_rand($data)] = '..';
    return implode(' ', $data);
}

function getAnswer(string $question)
{
    $data = explode(' ', $question);
    for ($i = 0, $length = count($data); $i < $length; $i++) {
        if ($data[$i] === '..') {
            $diff = array_key_exists($i + 2, $data) ? $data[$i + 2] - $data[$i + 1] : $data[$i - 1] - $data[$i - 2];
            $answer = array_key_exists($i - 1, $data) ? $data[$i - 1] + $diff : $data[$i + 1] - $diff;
        }
    }
    return $answer;
}
