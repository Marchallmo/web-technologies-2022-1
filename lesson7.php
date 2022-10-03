<!doctype html>
<html lang="ru">
<?php
date_default_timezone_set('Asia/Yekaterinburg');
$title = 'Заголовок';
$h1 = 'h1';
$currentYear = date('Y');
   function timeToString()
   {
       $hour = date('H');
       $minute = date('i');

       if ($hour == 1 || $hour == 21) {
           $hoursStr = ' час';
       } elseif (($hour >= 2 && $hour <= 4) || ($hour >= 22 && $hour <= 24)) {
           $hoursStr = ' часа';
       } else {
           $hoursStr = ' часов';
       }

       if (($minute < 20)) {
           $minutesStr = ' минут.';
       } elseif (($minute % 10) === 1) {
           $minutesStr = ' минута.';
       } elseif ((($minute % 10) >= 2) && (($minute % 10) <= 4)) {
           $minutesStr = ' минуты.';
       } else {
           $minutesStr = ' минут.';
       }

       return $hour . $hoursStr . ' ' . $minute . $minutesStr;
      }
   $result = timeToString();
?>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?= $title  ?></title>
</head>
<body>
<h1><?= $h1 ?></h1>
<h1><?= $currentYear ?></h1>

<h1> Текущее время: <?= $result ?></h1>
</html>
