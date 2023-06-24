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
    <tr id="tableFilter"></tr>
</table>
<div id="tableServer"></div>
<script src="js/test.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>