<?php
namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

function isEven(int $number)
{
    if($number % 2 === 0) {
        echo "Correct!";
    }
}
function play()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
        
    $correctAnswersNeeded = 3;
    $correctAnswers = 0;

    while ($correctAnswers < $correctAnswersNeeded) {
        
        $number = rand(1, 100);
        line('Question: %s', $number);
        $answer = prompt('Your answer');

        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($answer === $correctAnswer) {
            line('Correct!');
            $correctAnswers++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was 'no'", $answer, $correctAnswer);
            line("Let's try again!");
            return;
        }
    }

    line("Congratulations, %s!");
    
}