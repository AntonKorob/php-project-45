<?php
namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

// ============================================

// runCalculator
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
function runCalculator()
{
    $correctAnswersNeeded = 3;
    $correctAnswers = 0;

    // Game loop
    while ($correctAnswers < $correctAnswersNeeded) {
        $a = generateRandomNumber(1, 100);
        $b = generateRandomNumber(1, 100);

        $operation = generateRandomOperation();

        line('Question: %d %s %d', $a, $operation, $b);
        $userAnswer = prompt('Your answer');

        $correctAnswer = calculate($a, $b, $operation);

        if ((int) $userAnswer === $correctAnswer) {
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

// ============================================
function isEven(int $number)
{
    if ($number % 2 === 0) {
        return true;
    };
}
function play()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswersNeeded = 3;
    $correctAnswers = 0;

    for ($correctAnswers = 0; $correctAnswers < $correctAnswersNeeded; $correctAnswers++) {
        $number = rand(1, 100);
        line('Question: %s', $number);
        $answer = prompt('Your answer');

        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again!");
            return;
        }
    }

    line("Congratulations, %s!");

}

// ============================================

// runCaclulatorNOD
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
function runCaclulatorNOD()
{
    $correctAnswersNeeded = 3;
    $correctAnswers = 0;

    while ($correctAnswers < $correctAnswersNeeded) {
        $a = generateRandomNumber(1, 100);
        $b = generateRandomNumber(1, 100);


        line('Find the greatest common divisor of given numbers.');
        line('Question: %s %s', $a, $b);

        $correctAnswer = calculateNOD($a, $b);

        $userAnswer = prompt('Your answer');

        if ((int) $userAnswer === $correctAnswer) {
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

// ============================================

// runPrime
function isPrime($n)
{
    // Числа меньше 2 не являются простыми
    if ($n < 2) {
        return false;
    }

    // 2 — единственное четное простое число
    if ($n === 2) {
        return true;
    }

    // Все остальные четные числа не являются простыми
    if ($n % 2 === 0) {
        return false;
    }

    // Проверяем делители от 3 до квадратного корня из n
    for ($i = 3; $i <= sqrt($n); $i += 2) {
        if ($n % $i === 0) {
            return false;
        }
    }

    // Если ни одно из условий не выполнено, число простое
    return true;
}
function runPrime()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $number = generateRandomNumber(1, 100);
    line('Question: %s', $number);
    $answer = prompt('Your answer');

    $correctAnswer = isPrime($number) ? 'yes' : 'no';

    if ($answer === $correctAnswer) {
        line('Correct!');
    } else {
        line("'%s' is wrong answer ;(. Correct answer was 'no'", $answer, $correctAnswer);
        line("Let's try again!");
        return;
    }

}
// ============================================

// playProgressionGame
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
function runProgressionGame()
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

        // var_dump($progression);
        // Показываем прогрессию
        line('Question: %s', implode(' ', $progression));
        $userAnswer = prompt('Your answer');

        // Проверяем ответ
        if ((int) $userAnswer === $hiddenValue) {
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









