<!DOCTYPE html>
<html lang='ru'>
<?php

function operationWithTwoNumbers($a, $b) {
    if($a >= 0 && $b >= 0) {
        return $a - $b;
    } else {
        if($a < 0 & $b < 0) {
            return $a * $b;
        } else {
            return $a + $b;
        }
    }
}

function outputNumbers() {
    $a = mt_rand(0, 15);
    for ($i = $a; $i <= 15; $i++) {
        switch ($a) {
            case $i:
                echo $a++ . ' ';
        }
    }
}

function mathOperation($arg1, $arg2, $operation){
    switch ($operation){
        case '+': return $arg1 + $arg2;
        case '-': return $arg1 - $arg2;
        case '*': return $arg1 * $arg2;
        case '/': return $arg1 / $arg2;

        default: return 'Операции не существует';
    }
}

$currentYear = date('Y');

function outputEvenOrOddNumber() {
    $outputArray = [];

    $number = 0;

    do {
        if ($number == 0) {
            array_push($outputArray, $number . ' – это ноль');
        } elseif ($number & 1 != 0) {
            array_push($outputArray, $number . ' - нечётное число');
        } else {
            array_push($outputArray, $number . ' - чётное число');
        }

        $number++;
    } while ($number <= 10);

    return $outputArray;
}

$outputArray = outputEvenOrOddNumber();

function getCitiesFromRegion() {
    $regions = [
        'Московская область' => ['Москва', 'Зеленоград', 'Красногорск'],
        'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
        'Рязанская область' => ['Рязань', 'Сасово', 'Скопин', 'Ряжск', 'Михайлов']
    ];

    foreach ($regions as $region => $cities) {
        echo '<div>'.$region.':'.'<div>';

        for ($i = 0; $i < count($cities); $i++){
            if($i == count($cities) - 1) {
                echo $cities[$i] .'.';
            } else {
                echo $cities[$i] .', ';
            }
        }
        echo '</div> </div>';
    }
}

function transliteration($str) {
    $alphabet = [
        'a' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ъ' => '',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
    ];

    return strtr($str, $alphabet);
}

function renderStructMenu() {
    $structMenu = [
        'Главная' => ['Велосипеды' => ['Гоночные', 'Горные'], 'Комплектующие'],
        'Корзина' => ['Купленные' => ['Велосипеды', 'Комплектующие'], 'Избранное' => ['Велосипеды', 'Комплектующие']]
    ];
    $result = '';
    $result .= '<ul>' . renderMenu($structMenu) . '</ul>';

    return $result;
}

function renderMenu($structMenu){
    $struct = '';

    foreach($structMenu as $item => $value) {
        if(is_array($value)) {
            $struct .= '<li>' . $item . '</li>';
            $struct .= '<ul>' . renderMenu($value) . '</ul>';
        } else {
            $struct .= '<li>' . $value . '</li>';
        }

    }

    return $struct;
}


?>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>hi</title>
</head>
<body>

<h1> Задание 1 </h1>
<h2>с числами 1 и 2: <?= operationWithTwoNumbers(1, 2) ?></h2>
<h2>с числами -3 и -2: <?= operationWithTwoNumbers(-3, -2) ?></h2>
<h2>с числами -8 и 1: <?= operationWithTwoNumbers(-8, 1) ?></h2>

<h1> Задание 2 </h1>
<h2> <?= outputNumbers() ?></h2>

<h1> Задание 3 </h1>
<h2>Аргументы 3 и 2</h2>
<h2> Операция сложения <?= mathOperation(3, 2, '+') ?></h2>
<h2> Операция разности <?= mathOperation(3, 2, '-') ?></h2>
<h2> Операция произведения <?= mathOperation(3, 2, '*') ?></h2>
<h2> Операция деления <?= mathOperation(3, 2, '/') ?></h2>

<h1> Задание 4 </h1>
<h2> Текущий год: <?= $currentYear ?></h2>

<h1> Задание 5 </h1>
<h2>
    <?php
    foreach($outputArray as $value) {
        echo $value . '<br>';
    }

    unset($value);
    ?>
</h2>

<h1> Задание 6 </h1>
<h2> <?= getCitiesFromRegion() ?></h2>

<h1> Задание 7 </h1>
<h2> <?= transliteration('Написать функцию транслитерации строк') ?></h2>

<h1> Задание 8 </h1>
<div> <?= renderStructMenu() ?></div>
</body>
</html>