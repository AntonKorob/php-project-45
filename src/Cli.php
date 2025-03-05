<?php
namespace BrainGames\Cli;

use function WP_CLI\Utils\line;
use function WP_CLI\Utils\prompt;

function welcome()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
}