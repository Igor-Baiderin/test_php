<?php
if (empty($_GET['name'])) {
    die('File not specified');
}
echo $_GET['name'];
echo '<br>';
var_dump($_POST['content']);