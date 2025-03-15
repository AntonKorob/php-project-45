<?php
namespace BrainGames\Games\Prime;


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

