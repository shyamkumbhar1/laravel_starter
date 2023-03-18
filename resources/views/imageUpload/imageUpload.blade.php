<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div> 
  <h1>Image Upload </h1>
    <form action="upload-image" method="POST"  enctype="multipart/form-data">
        @csrf 
        <input type="file" placeholder="image" name="image">
        <button type="submit">Upload</button>
    </form>
  </div>

  <div>
    <h1>User Data</h1>
    <!-- {{$images}} -->

    @foreach ($images as $image)
    | <img class="img-thumbnaill" src="{{ asset( 'storage/images/' . $image->name)}}">
 @endforeach
  </div>
</body>
</html>