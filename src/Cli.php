<?php
namespace Brain\Games\Cli;
$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1; 
}else {
    require_once $autoloadPath2; 
}
use function cli\line;
use function cli\prompt;
function makeHello()
{
	\cli\line('Welcome to Brain Game!');
	$name = \cli\prompt('May I have your name?');
	\cli\line("Hello, %s", $name);
}

