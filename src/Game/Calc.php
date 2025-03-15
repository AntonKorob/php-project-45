<?php
namespace BrainGames\Game\Calc;

// generateRandomNumber
function generateRandomNumber(int $min, int $max): int
{
    return rand($min, $max);
}

// generateRandomOperation
function generateRandomOperation(): string
{
    $operations = ['+', '-', '*'];
    return $operations[array_rand($operations)];
}

// calculate
function calculate(int $a, int $b, string $operation): int
{
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        default:
            throw new \InvalidArgumentException("Unsupported operation: $operation");
    }
}
