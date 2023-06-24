<?php
require_once('DataFile.php');
$dataArr = new DataFile();
$answer['table'] = $dataArr->getConfig();
$answer['tool'] = $dataArr->getTool();
$answer['author'] = $dataArr->getAuthor();
echo json_encode($answer);