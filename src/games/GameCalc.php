<?php

namespace BrainGames\Games\GameCalc;

use function BrainGames\Cli\makeHello;
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

function GameCalc()
{
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require_once(__DIR__ . '/../vendor/autoload.php');
    } else {
        require_once(__DIR__ . '/../../vendor/autoload.php');
    }
    $name = makeHello();
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        $question = getQuestion(getData());
        runGame($name, $question, $answer);
    }
    line("Congratulations, %s!", $name);
}
function getAction()
{
    $actions = ['+', '-', '*', '/'];
    return $actions[array_rand($actions)];
}

function calc(string $action, array $numbers)
{
    [$num1, $num2] = $numbers;
    switch ($action) {
        case '+':
            return $num1 + $num2;
            break;
        case '-':
            return $num1 - $num2;
            break;
        case '*':
            return $num1 * $num2;
            break;
        case '/':
            return floor($num1 / $num2);
            break;
    }
}
function getNumber(): int
{
    return mt_rand(0, 99);
}

function getData()
{
    $firstNum = getNumber();
    $secoundNum = getNumber();
    while ($secoundNum === 0) {
        $secoundNum = getNumber();
    }
    $action = getAction();
    return [$firstNum, $secoundNum, $action];
}

function getQuestion(array $data)
{
    [$firstNum, $secoundNum, $action] = $data;
    $answer = calc($action, [$firstNum, $secoundNum]);
    return ['question' => "{$firstNum} {$action} {$secoundNum}",
            'answer' => $answer];
}
