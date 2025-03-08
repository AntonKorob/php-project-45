<?php

namespace Engine\Calc;

use function cli\line;
use function cli\prompt;

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
// runCalculator
function runCalculator()
{

    $correctAnswersNeeded = 3;
    $correctAnswers = 0;

    while ($correctAnswers < $correctAnswersNeeded) {
        $a = generateRandomNumber(1, 100);
        $b = generateRandomNumber(1, 100);
        $operation = generateRandomOperation();

        line('Question: %d %s %d', $a, $operation, $b);
        $userAnswer = prompt('Your answer');

        $correctAnswer = calculate($a, $b, $operation);

        if ((int)$userAnswer === $correctAnswer) {
            line('Correct!');
            $correctAnswers++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%d'.", $userAnswer, $correctAnswer);
            line("Let's try again!");
            return;
        }
    }

    line('Congratulations! You solved all problems correctly!');
}
