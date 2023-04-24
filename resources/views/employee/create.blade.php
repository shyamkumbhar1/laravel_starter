<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('multi-record')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <Br><br>
       Cricket <input type="checkbox" name="hobby[]" value="cricket">
       Music <input type="checkbox" name="hobby[]" value="music">
     <button type="submit">Submit</button>
    </form>
</body>
</html>