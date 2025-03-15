<?php
namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

use function BrainGames\Game\Calc\generateRandomNumber;
use function BrainGames\Game\Calc\generateRandomOperation;
use function BrainGames\Game\Calc\calculate;

use function BrainGames\Game\Even\isEven;

use function BrainGames\Game\Gcd\calculateNOD;

use function BrainGames\Games\Prime\isPrime;

use function BrainGames\Games\Progression\generateProgression;
use function BrainGames\Games\Progression\hideElement;

// ============================================

// runCalculator
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
// ============================================
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

// ============================================

// runPrime

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









