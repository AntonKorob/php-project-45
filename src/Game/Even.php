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