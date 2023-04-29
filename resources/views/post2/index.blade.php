<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

 @if (session('message'))
       <div class="alert alert-success">
        {{ session('message') }}
    </div>
 @endif
    <h1>Index Page</h1>
    <h1><a href="{{ url('post2/create') }}">Add</a></h1>

    <table border="1">
        <thead>
            <tr>
                <td>Sr.No</td>
                <td>Title</td>
                <td>Body</td>
                <td>Action</td>

            </tr>
        </thead>
        <tbody>
            @foreach($post2 as $list)
                <tr>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->title }}</td>
                    <td>{{ $list->body }}</td>
                    <td>
                        <a href="{{ url('post2/'.$list->id.'/edit') }}">Edit</a>
                        <form action="{{ url('post2/'.$list->id) }}" method="post">
                            @csrf 
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
