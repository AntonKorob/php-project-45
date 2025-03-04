<?php
namespace cli;
require_once __DIR__ . '/vendor/autoload.php';

function prompt(string $name)
{
    $name = trim($name);
    echo $name;    
}

function line($str, $userName)
{
    $str = trim($str);
    $usreName = trim($userName);
    echo $str . " " . $userName;
}