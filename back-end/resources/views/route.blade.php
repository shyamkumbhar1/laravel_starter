<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Routing </h1>
    {{route('home')}} // return complete url 
    <div>
    <a href="home">Home Page</a>
    <a href="about">About Page</a>
    </div>
    <hr>
    <div>
    <a href="{{route('home')}}">Home Page</a>
    <a href="{{route('about',['category'=>'mobile'])}}">About Page</a>
    </div>
</body>
</html>