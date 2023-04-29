<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Index Page</h1>
    <form action="{{url('post2')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="body" placeholder="Name">

    <button type="submit">Submit</button>

    </form>
</body>
</html>