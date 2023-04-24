<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Data</h1>
    @php
    $hobbies = json_decode($data->hobby);
   
    @endphp

   <form action="{{ url('multi-record/' . $data->id ) }}" method="post">

        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Name" value="{{$data->name}}" >
        <Br><br>
       Cricket <input type="checkbox" name="hobby[]" value="cricket" {{in_array('cricket',$hobbies) ? 'checked' : ''}} >
       Music <input type="checkbox" name="hobby[]" value="music" {{in_array('music',$hobbies) ? 'checked' : ''}}>
     <button type="submit">Submit</button>
    </form>
</body>
</html>