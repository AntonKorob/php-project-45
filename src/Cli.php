<?php
namespace BrainGames\Cli;

use function WP_CLI\Utils\line;

function welcome()
{
    line('Welcome to the Brain Games!');
    $name = \WP_CLI\Utils\prompt('May I have your name?');
    line("Hello, $name!");
}