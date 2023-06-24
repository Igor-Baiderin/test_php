<?php
require_once('DataFile.php');
$dataArr = new DataFile();
$data = $dataArr->getConfig();
$answer['table'] = $data;
$answer['elem'] = ['elem' => 'Еще элементик'];
echo json_encode($answer);