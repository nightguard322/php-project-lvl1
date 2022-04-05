<?php

namespace Brain\Games\Cli;

require_once __DIR__ . '/../vendor/autoload.php';
use function cli\line;
use function cli\prompt;

function makeHello()
{
    \cli\line('Welcome to Brain Game!');
    $name = \cli\prompt('May I have your name?');
    \cli\line("Hello, %s", $name);
}
