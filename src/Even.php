<?php
namespace Brain\Games\Even;
use function cli\line;
use function cli\prompt;

function gameEven($name)
{
    \cli\line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $questionNumber = getNumber();
        \cli\line('Question: ' . $questionNumber);
        $result = ['answer' => "Your answer:",
                    'right' => "Correct!",
                    'wrong' => "'yes' is wrong answer ;(. Correct answer was 'no'\nLet's try again, $name!"
                    ];
        $answer = \cli\prompt('Your answer');
        if (isEven($questionNumber)) {
            if (strtolower($answer) === 'yes') {
                \cli\line($result['right']);  
                continue;
            }
            exit(\cli\line($result['wrong']));
        } else {
            if (strtolower($answer) === 'no') {
                \cli\line($result['right']);
                continue;  
            }
            exit(\cli\line($result['wrong']));
        }
    }
    echo \cli\line("Congratulations, $name!");

}
function isEven($num): bool
{
    if ($num % 2 === 0) {
        return true;
    }
    return false;
}

function getNumber(): int
{
    return mt_rand(1, 100);
}