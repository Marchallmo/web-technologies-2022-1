<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test title</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Yekaterinburg');

function draw_images() {
    $image_dir = './images';
    $image_files = scandir($image_dir);
//переименовать изображения если они на русском
    for ($i = 2; $i < count($image_files); $i++) {
        $path_image = $image_dir . DIRECTORY_SEPARATOR . $image_files[$i];
        echo '<a href="/' . $path_image .'"><img src="/'. $path_image . '" alt="image" width=400px height=300px style="margin: 10px; border:  1px solid black;"> </a>';
    }
}

function logger() {
    $log_dir = __DIR__ . DIRECTORY_SEPARATOR . 'logs';
    $log_files = scandir($log_dir);

    if(!file_exists($log_dir)) {
        mkdir($log_dir, 0777, true);
    }

    $log_files_count = count($log_files) - 2;

    $date = date('c');

    if($log_files_count === 0) {
        file_put_contents($log_dir . DIRECTORY_SEPARATOR . 'log.txt', $date . PHP_EOL, FILE_APPEND);
    } else {
        $last_log = end($log_files);
        $log_data = explode(PHP_EOL,file_get_contents($log_dir . DIRECTORY_SEPARATOR . $last_log));

        if(count($log_data) - 1 >= 10) {
            $log_number = +preg_replace('/[^0-9]/', '', $last_log) + 1;
            file_put_contents($log_dir . DIRECTORY_SEPARATOR . 'log' . $log_number . '.txt', $date . PHP_EOL);
        } else {
            file_put_contents($log_dir . DIRECTORY_SEPARATOR . $last_log, $date . PHP_EOL, FILE_APPEND);
        }
    }

    $logs_pattern = $log_dir . DIRECTORY_SEPARATOR . "log[0-9]*.txt";
    foreach (glob($logs_pattern) as $filename) {
        echo "$filename \n";
    }
}

draw_images();
logger();
?>
</body>
</html>