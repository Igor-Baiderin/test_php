<?php
$directory = 'articles';
$filesDraft = scandir($directory);
$absDirectory = __DIR__ . DIRECTORY_SEPARATOR . $directory;
$files = array_values(array_filter($filesDraft, function ($file) {
    return strlen($file) > 3;
}));
$data = [];
foreach ($files as $file)
{
    $item = file_get_contents($absDirectory.DIRECTORY_SEPARATOR.$file);
    $regexp = "/(?<=---)[\s\S]+?(?=---)/ui";
    $match = [];
    preg_match($regexp, $item, $match);
    $arr = explode(PHP_EOL, trim($match[0]));
    $dataArr = [];
    foreach ($arr as $value) {
        $i = explode(':', $value);
        $dataArr[trim($i[0])] = str_replace('"', '', trim($i[1]));;
    }
    $dataArr['file'] = $file;
    $data[] = $dataArr;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/test.css">
    <title>Testing Task</title>
</head>
<body class="container-fluid">
<div class="row mt-3">
    <div class="col-2">
        <input type="text" class="form-control" placeholder="Filter by Title, URL, Content">
    </div>
    <div class="dropdown col-1">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Select Tool to filter
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>
    <div class="dropdown col-1 ms-5">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Published
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>
    <div class="dropdown col-1">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Select Author to filter
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>
</div>

<table class="table table-bordered mt-3">
    <tr class="table-test-header">
        <th>#</th>
        <th class="table-test-url">URL</th>
        <th>TITLE</th>
        <th class="table-test-edit"></th>
        <th>STATUS</th>
        <th>AUTHOR</th>
        <th>CATEGORY</th>
        <th>TOOL</th>
        <th>VIEWS</th>
        <th>PUBLISHED ON</th>
        <th>MODIFIED ON</th>
        <th class="table-test-unpublish"></th>
    </tr>
    <?php foreach ($data as $key => $i):?>
    <tr class="align-middle">
        <td><?=$key?></td>
        <td class="d-inline-block text-truncate table-test-url"><?=$i['file']?></td>
        <td><?=$i['title']?></td>
        <td class="table-test-edit"><a type="button" class="btn btn-success btn-sm" href="edit.php">EDIT</a></td>
        <td>Published</td>
        <td><?=$i['author']??''?></td>
        <td><?=$i['category']?></td>
        <td><?=$i['tool']?></td>
        <td><?=$i['views']?></td>
        <td><?=stristr($i['published_on'], ' ', true)?></td>
        <td><?=stristr($i['modified_on'], ' ', true)?></td>
        <td class="table-test-unpublish">
            <button type="button" class="btn btn-light btn-sm">UNPUBLISH</button>
        </td>
    </tr>
    <?php endforeach;?>
</table>
<script src="js/test.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>