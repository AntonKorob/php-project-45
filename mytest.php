<?php
echo 'Hello Anton ...';
function dd($item)
{
    var_dump($item);
}
// $data = ['first_name' => 'Mark', 'last_name' => 'Smith'];

// $keys = array_keys($data);
// foreach($keys as $key) {
//     print_r($data[$key]);
// }


// function genDiff($data, $values)
// {
//     $arrValues = [];
//     $arrKeys = [];

//     $keys = array_keys($data);
//     foreach($keys as $key){
//         $arrKeys[] = $key;
//     }
//     $values = array_values($values);
//     foreach($values as $value){
//         $arrValues[] = $value;
//     }

//     $resultArr = array_merge($arrKeys, $arrValues);

//     return $resultArr;

// }
// Реализуйте функцию joinNumbersFromRange(), которая объединяет все числа из диапазона в строку. Функция должна вернуть полученную строку

// function joinNumbersFromRange($start, $end)
// {
//     $numbers = range($start, $end);
//     $result = implode('', $numbers);
//     return $result;
// }
// print_r(joinNumbersFromRange(1, 10));

// function isArgumentsForSubstrCorrect(string $str,int $index,int $length)
// {
//     if ($index < 0 || $length < 0 || $index + $length > strlen($str)) {
//         return false;
//     }
//     return true;

// }
// dd(isArgumentsForSubstrCorrect('Sansa Stark', 4, 100)); // true

function genDiff(array $item1,array $item2):array
{
    $diff = [];
    foreach ($item1 as $key => $value) {
        if (!array_key_exists($key, $item2) || $item1[$key]!= $item2[$key]) {
            $diff[$key] = $value;
        }
    }
    return $diff;
}

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03']
];
// function getSortedNames($users)
// {
//     if (empty($users)) {
//         return [];
//     }
//     usort($users, function ($a, $b) {
//         return $a['name'] <=> $b['name'];
//     });
//     return array_column($users, 'name');

// }
// dd(getSortedNames($users)); // ['Bronn', 'Eiegon', 'Reigar', 'Sansa']

function make($arr)
{  
    $map = [];
    foreach ($arr as $key => $value) {
        $hash = crc32($key);
        $index = $hash % 1000;
        $map[$index][$key] = $value;
    }
    return $map;
}


// function set(&$map, $key, $value)
// {
//     if (is_array($map) && array_key_exists($key, $map)) {
//         return false;
//     }
//     return true;
// }

// function get(&$map, $key2, $value2)
// {
//     $result = get;

// }
// $checksum = crc32("The quick brown fox jumped over the lazy dog.");
// printf("%u\n", $checksum);

//=====================================================

// Реализуйте функцию buildQueryString, которая принимает на вход список параметров и возвращает сформированный query string из этих параметров:

// Примеры
// <?php


// → page=1&per=10



function buildQueryString($params)
{
    if(empty($params) ||!is_array($params)) {
        '';
    }
    ksort($params);
    
    $queryParts = [];
    foreach ($params as $key => $value) {
        $queryParts[] = urlencode($key) . '=' . urlencode($value);
    }
    $http = 'https://ru.hexlet.io/blog?';
    $query = implode('&', $queryParts);
    return $http . $query;
}
// dd(buildQueryString([ 'page' => 5 ])); // https://ru.hexlet.io/blog?page=1&per=10
// dd(buildQueryString([ 'page' => 1, 'per' => 10])); // https://ru.hexlet.io/blog?page=1&per=10
// dd(buildQueryString([ ])); // https://ru.hexlet.io/blog?page=1&per=10


// Реализуйте функцию fromPairs, которая принимает на вход массив, состоящий из массивов-пар, и возвращает ассоциативный массив, полученный из этих пар.

// Примечания
// Если при конструировании объекта попадаются совпадающие ключи, то берётся значение из последнего массива-пары:
// <?php

$data = [['cat', 5], ['dog', 6], ['cat', 11]];
function fromPairs($data)
{
    $a = [];
    $b = [];
    foreach ($data as $pair) {
        $a[] = $pair[0];
        $b[] = $pair[1];
    }
    return array_combine($a, $b);
}

// =======================================================
// dd(fromPairs($data)); 

// ДНК и РНК это последовательности нуклеотидов.

// Четыре нуклеотида в ДНК это аденин (A), цитозин (C), гуанин (G) и тимин (T).

// Четыре нуклеотида в РНК это аденин (A), цитозин (C), гуанин (G) и урацил (U).

// Цепь РНК составляется на основе цепи ДНК последовательной заменой каждого нуклеотида:

// G -> C
// C -> G
// T -> A
// A -> U
// src/Solution.php
// Напишите функцию toRna, которая принимает на вход цепь ДНК и возвращает соответствующую цепь РНК (совершает транскрипцию РНК).
// toRna('ACGTGGTCTTAA');
// → 'UGCACCAGAAUU'

$dna = 'ACGTGGTCTTAA';
function toRna(string $dna):string
{
    $rnaMap = [
        'G' => 'C',
        'C' => 'G',
        'T' => 'A',
        'A' => 'U'
    ];
    
    return strtr($dna, $rnaMap);

}
// dd(toRna($dna)); // UGCACCAGAAUU

// ========================

// Реализуйте функцию scrabble, которая принимает на вход два параметра: набор символов (строку) и слово, и проверяет, можно ли из переданного набора составить это слово. В результате вызова функция возвращает true или false.

// При проверке учитывается количество символов, нужных для составления слова, и не учитывается их регистр.

// Примеры
// <?php

// use function App\Solution\scrabble;

// scrabble('rkqodlw', 'world'); // true
// scrabble('avj', 'java'); // false
// scrabble('avjafff', 'java'); // true
// scrabble('', 'hexlet'); // false
// scrabble('scriptingjava', 'JavaScript'); // true

function scrabble($characters, $word)
{
    $characters = strtolower($characters);
    $word = strtolower($word);
    
    $charArray = str_split($characters);
    $wordArray = str_split($word);
    
    $charCount = array_count_values($charArray);
    
    foreach ($wordArray as $letter) {
        if (!isset($charCount[$letter]) || $charCount[$letter] == 0) {
            return false;
        }
        $charCount[$letter]--;
    }
    
    return true;
}

// Счастливым" называют билет с номером, в котором сумма первой половины цифр равна сумме второй половины цифр. Номера могут быть произвольной длины, с единственным условием, что количество цифр всегда чётно, например: 33 или 2341 и так далее.

// Билет с номером 385916 — счастливый, так как 3 + 8 + 5 = 9 + 1 + 6. Билет с номером 231002 не является счастливым, так как 2 + 3 + 1 != 0 + 0 + 2.

// src/Ticket.php
// Реализуйте функцию isHappy, проверяющую является ли номер счастливым (номер — всегда строка). Функция должна возвращать true, если билет счастливый, или false, если нет.

// Примеры использования:
// <?php

// use function Ticket\isHappy;

// isHappy('231002'); // false
// isHappy('1222'); // false
// isHappy('054702'); // true
// isHappy('00'); // true

function isHappy(string $number): bool
{
    $sum = 0;
    for ($i = 0; $i < strlen($number); $i++) {
        $digit = $number[$i];
        $sum += $digit ** 2;
    }
    
    return $sum == 1 || isHappy($sum);
}

// dd(isHappy('385916')); // true

// Реализуйте функцию addDigits(), которая принимает на вход неотрицательное целое число и возвращает другое число, полученное из первого следующим преобразованием: Итеративно сложите все входящие в него цифры до тех пор, пока не останется одна цифра.

// Для числа 38 процесс будет выглядеть так:

// // 38 состоит из двух цифр, складываем их
// 3 + 8 = 11 // результат сложения тоже состоит из двух цифр, поэтому складываем их
// 1 + 1 = 2 // результат это одна цифра, возвращаем ее
// Для числа 919 процесс будет выглядеть так:

// 9 + 1 + 9 = 19
// 1 + 9 = 10
// 1 + 0 = 1

$number = 38;
function addDigits(int $number): int
{
    if($number <= 0){
        return 0;
    }
    $number = (string)$number;
    $number = str_split($number);
    while(count($number) > 1){
        $sum = array_sum($number);
        $number = str_split((string)$sum);
    }
    return $number[0];
}
// dd(addDigits($number)); // 2

// ===========================

// Реализуйте функцию getMirrorMatrix, которая принимает двумерный массив (матрицу). Далее эта функция возвращает измененный массив, в котором правая половина матрицы становится зеркальной копией левой половины, симметричной относительно вертикальной оси. Для простоты условимся, что:

// Матрица всегда имеет четное количество столбцов
// Количество столбцов всегда равно количеству строк
// <?php



// function getMirrorMatrix(array $matrix): array
// {
//     $size = count($matrix);
//     $halfSize = $size / 2;

//     for ($i = 0; $i < $size; $i++) {
//         for ($j = $halfSize; $j < $size; $j++) {
//             $matrix[$i][$j] = $matrix[$i][$size - $j - 1];
//         }
//     }

//     return $matrix;
// }

function getMirrorMatrix($matrix) {
    $length = count($matrix);
    $miLength = $length / 2;
    foreach($matrix as &$row) {
        for($i = 0; $i < $miLength; $i+=1){
            $row[$length - 1 - $i] = $row[$i];

        }

    }

    return $matrix;
}
// getMirrorMatrix([
//   [11, 12, 13, 14],
//   [21, 22, 23, 24],
//   [31, 32, 33, 34],
//   [41, 42, 43, 44],
// ]);

function hammingWeight(int $n): int
{
    return substr_count(decbin($n), '1');
}

// Реализуйте функцию combine(), которая объединяет несколько словарей (ассоциативных массивов) в один общий словарь. Функция принимает на вход массив массивов и возвращает результат в виде ассоциативного массива, в котором каждый ключ содержит список уникальных значений в виде массива. Элементы в списке располагаются в том порядке, в котором они появляются во входящих словарях.

// <?php
// combine([[], [], [], []]);
// [];

function combine(array $data)
{
    $result = [];
    foreach($data as $val){
        foreach($val as $k => $v){
            if(!isset($result[$k])){
                $result[$k] = [];

            }
            if(!in_array($v, $result[$k])){
                $result[$k][] = $v;
            }
        }
    }
    return $result;
}
// dd(combine([
//     [ 'a' => 1, 'b' => 2, 'c' => 3 ],
//     [],
//     [ 'a' => 3, 'b' => 2, 'd' => 5],
//     [ 'a' => 6 ],
//     [ 'b' => 4, 'c' => 3, 'd' => 2 ],
//     [ 'e' => 9 ],
// ]));

function romanToInt($s) {
    $romanValues = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];
    
    $total = 0;
    $prevValue = 0;
    
    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        $currentValue = $romanValues[$s[$i]];
        
        if ($currentValue >= $prevValue) {
            $total += $currentValue;
        } else {
            $total -= $currentValue;
        }
        
        $prevValue = $currentValue;
    }
    
    return $total;
}
// dd(romanToInt("IIIV"));


// Example 1:

$strs = ["flower","flow","flight"];
// Output: "fl"
function longestCommonPrefix(array $strs)
    {
        if(empty($strs)){
            return '';
        }

        $prefix = $strs[0];
        $length = strlen($prefix);

        foreach ($strs as $str) {
            while ($length > 0 && strncmp($prefix, $str, $length)!== 0) {
                $length--;
                $prefix = substr($prefix, 0, $length);
        }
        if($length == 0){
            return '';
        }
        }
        return $prefix;
    }
// dd(longestCommonPrefix($strs));

$s = '{}()[][h';
function isValid($s) {
    $stack = [];
    $map = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];
    for($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if(in_array($char, ['(', '[', '{'])) {
            array_push($stack, $char);
        }elseif (array_key_exists($char, $map)) {
            if(empty($stack) || array_pop($stack)!== $map[$char]) {
                return false;
            }
        }

    }
   
    return empty($stack);
}


// dd(isValid($s));


