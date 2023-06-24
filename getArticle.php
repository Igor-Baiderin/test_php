<?php
$file = $_GET["file"];
$path = __DIR__ . DIRECTORY_SEPARATOR . parse_ini_file("test.ini")['directory'] . DIRECTORY_SEPARATOR . $file;
$content = file_get_contents($path);
echo json_encode($content);