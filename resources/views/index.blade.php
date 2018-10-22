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
    @foreach ($foods as $food)
    <div>
        <p><a href="#">{{$food->name}}</a></p>
        <div>
            <img src="{{ url('storage/images/'.$food->image_path1) }}" alt="">
        </div>
        <div>
            <img src="{{ url('storage/images/'.$food->image_path2) }}" alt="">
        </div>
    </div>
    @endforeach
</body>
</html>