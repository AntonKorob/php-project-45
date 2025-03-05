<?php
namespace BrainGames\Cli;

use function \wp\cli\line;

function welcome()
{
    WP_CLI::line('Welcome to the Brain Games!');
    $name = WP_CLI::prompt('May I have your name?');
    WP_CLI::line("Hello, $name!");
}