<?php
$content = $_REQUEST;
$path = __DIR__ . DIRECTORY_SEPARATOR . parse_ini_file("test.ini")['directory'] . DIRECTORY_SEPARATOR . $content['file'];
$fd = fopen($path, 'w') or die("не удалось открыть файл");
fwrite($fd, $content['content']);
fclose($fd);
header('Location:'.'index.html');
exit;