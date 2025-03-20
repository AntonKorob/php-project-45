<?php
namespace BrainGames\Game\Calc;

// require __DIR__ . '/../vendor/autoload.php';
$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
} 
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\generateRandomNumber;
use function BrainGames\Engine\generateRandomOperation;
use function BrainGames\Engine\calculate;

// generateRandomNumber
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
