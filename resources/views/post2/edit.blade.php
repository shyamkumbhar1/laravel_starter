<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Page</h1>
  
  
    <form action="{{ url('post2/'. $post2->id ) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" placeholder="Title" value="{{$post2->title}}">
    <input type="text" name="body" placeholder="Body" value="{{$post2->body}}">

    <button type="submit">Update</button>

    </form>
</body>
</html>