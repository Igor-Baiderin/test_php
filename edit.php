<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/test.css">
    <title>Testing Task Edit</title>
</head>
<body class="container-fluid mt-3">
<form name="article" method="post" action="controller.php?name=sss">
    <div>
        <label for="exampleFormControlTextarea1" class="form-label"><h4>Edit Article</h4></label>
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="30"></textarea>
    </div>
    <div class="mt-3">
        <a type="button" class="btn btn-secondary" href="index.php">Return without saving</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
<script src="js/test.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>