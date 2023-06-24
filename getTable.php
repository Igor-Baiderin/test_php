<?php
    require_once('DataFile.php');
    $dataArr = new DataFile();
    $data = $dataArr->getConfig();
    echo json_encode($data);
//echo 'jjjjjjjjjjjjjjjjj';
//
//var_dump( $_REQUEST);
//if (empty($_GET['name'])) {
//    die('File not specified');
//}
//echo $_GET['name'];
//echo '<br>';
//var_dump($_POST['content']);