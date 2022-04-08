<?php
namespace Brain\Games\Calc;
use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine;

function gameCalc($name)
{
    $task = 'What is the result of the expression?';
    \Brain\Games\Engine\showMessage($task);
    for ($i = 0; $i < 3; $i++) {
        $question = makeExpression();
        $answer = giveAnswer($question);
        \Brain\Games\Engine\gameEngine($name, $question, $answer);
    }
    \Brain\Games\Engine\showMessage("Congratulations, {$name}!");
}

function makeExpression(): string
{
    $actions = ['+', '-', '*', "/"];
    $num1 = getNumber();
    $num2 = getNumber();
    do {
        $operation = mt_rand(0, count($actions) - 1);
    } while (!checkNull($num2, $actions[$operation]));

    return "{$num1} {$actions[$operation]} {$num2}";
}

function giveAnswer($expression): int
{
    $expression = explode(' ', $expression);
    $result = 0;
    switch ($expression[1]) {
        case "+":
            $result = $expression[0] + $expression[2];
            break;
        case "-":
            $result = $expression[0] - $expression[2];
            break;
        case "*":
            $result = $expression[0] * $expression[2];
            break;
        case "/":
            $result = $expression[0] / $expression[2]; 
            break;
        default:
            exit('Произошла ошибка');
    }
    return $result;
}
function checkNull($num, $action): bool
{
    if ($num === 0 && $action === '/') {
        return false;
    }
    return true;
}
function getNumber(): int
{
    return mt_rand(0, 9);
}