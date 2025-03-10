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

// calculateNOD
function calculateNOD(int $a, int $b): int
{
// Начинаем с двух чисел, назовем их a и b.
// Проверяем, не равно ли b нулю:
// Если b равно 0, то НОД равен a.
// Если b не равно 0, обновляем значения:
// Присваиваем a значение b, а b — остаток от деления a на b.
// Повторяем шаги 2 и 3, пока b не станет равным 0.
// Когда b станет 0, a будет содержать НОД.

        // Пока b не равно 0
     while ($b !== 0) {
        // Сохраняем значение b
        $temp = $b;
        // Обновляем b как остаток от деления a на b
        $b = $a % $b;
        // Обновляем a как старое значение b
        $a = $temp;
    }
    // Когда b равно 0, НОД равен a
    return $a;
}
// runCalculator
function runCalculator()
{

    $correctAnswersNeeded = 3;
    $correctAnswers = 0;

    while ($correctAnswers < $correctAnswersNeeded) {
        $a = generateRandomNumber(1, 100);
        $b = generateRandomNumber(1, 100);
        // $a = 3;
        // $b = 2;
        $operation = generateRandomOperation();

        line('Question: %d %s %d', $a, $operation, $b);
        $userAnswer = prompt('Your answer');

        $correctAnswer = calculate($a, $b, $operation);

        // var_dump($correctAnswer);

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

function runCaclulatorNOD() 
{   
    $correctAnswersNeeded = 3;
    $correctAnswers = 0;

while ($correctAnswers < $correctAnswersNeeded) {
    $a = generateRandomNumber(1, 100);
    $b = generateRandomNumber(1, 100);
    // $a = 3;
    // $b = 15;

    line('Find the greatest common divisor of given numbers.');
    line('Question: %s %s', $a, $b);

    $correctAnswer = calculateNOD($a, $b);

    // var_dump($correctAnswer);

    $userAnswer = prompt('Your answer');

        if ((int)$userAnswer === $correctAnswer) {
            line('Correct!');
            $correctAnswers++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%d'.", $userAnswer, $correctAnswer);
            line("Let's try again!");
            return;
        }

        line('Congratulations!');
}
}

// generateProgression

function generateProgression(int $length, int $start, int $step): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

// hideElement
function hideElement(array $progression, int $hiddenIndex): array
{
    $progression[$hiddenIndex] = '..';
    return $progression;
}

// playProgressionGame
function playProgressionGame()
{
    $correctAnswersNeeded = 3;
    $correctAnswers = 0;

    while ($correctAnswers < $correctAnswersNeeded) {
        // Генерируем прогрессию
        $length = rand(5, 10);
        $start = rand(1, 20);
        $step = rand(1, 10);
        $progression = generateProgression($length, $start, $step);
        
        // Выбираем случайный элемент для скрытия
        $hiddenIndex = rand(0, $length - 1);
        $hiddenValue = $progression[$hiddenIndex];
        $progression = hideElement($progression, $hiddenIndex);
        
        var_dump($progression);
        // Показываем прогрессию
        line('Question: %s', implode(' ', $progression));
        $userAnswer = prompt('Your answer');

        // Проверяем ответ
        if ((int)$userAnswer === $hiddenValue) {
            line('Correct!');
            $correctAnswers++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $hiddenValue);
            line("Let's try again!");
            return;
        }
    }

    line("Congratulations!");
}


