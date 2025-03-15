<?php
namespace BrainGames\Games\Progression;

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

