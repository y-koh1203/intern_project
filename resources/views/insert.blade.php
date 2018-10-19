<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="/insert/process" method="post">

        <input type="text" name="name">

        <input type="text" name="address">

        <textarea name="body"></textarea>

        {{csrf_field()}}

        <button type="submit">insert</button>
    </form>
</body>
</html>