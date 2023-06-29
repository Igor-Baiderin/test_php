<?php
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    saveFile();
} elseif ($method == 'GET') {
    getFile();
}
function getFile()
{
    if ($file = $_GET["file"]) {
        $path = __DIR__ . DIRECTORY_SEPARATOR . parse_ini_file("test.ini")['directory'] . DIRECTORY_SEPARATOR . $file;
        $content = file_get_contents($path);
        echo json_encode($content);
    }
}

function saveFile()
{
    if ($content = $_REQUEST) {
        $path = __DIR__ . DIRECTORY_SEPARATOR . parse_ini_file("test.ini")['directory'] . DIRECTORY_SEPARATOR . $content['file'];
        $fd = fopen($path, 'w') or die("не удалось открыть файл");
        fwrite($fd, $content['content']);
        fclose($fd);
        header('Location:' . 'index.html');
        exit;
    }
}
