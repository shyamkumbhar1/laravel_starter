<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @if(session('insert_record'))
        <h1>{{ session('insert_record') }}</h1>
    @endif

    <h1>Index Page</h1>
    <a href="{{ url('multi-record/create') }} ">Add Employee Data</a>

    <form action="{{url('multi_record/destroy_multiple')}} " method="post">
      @csrf
    <table>
        <thead>
            <td>Delete</td>
            <td>Sr.No</td>
            <td>Name</td>
            <td>Hobby</td>
        </thead>
        <tbody>
            @foreach($employee as $list)

                <tr>
                    <td><input type="checkbox" name="ids[]" value="{{ $list->id }}"></td>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->name }}</td>
                    <td>

                        @php
                            $hobbies = json_decode($list->hobby)
                        @endphp

                        @foreach($hobbies as $hobby)

                            {{ $hobby }},
                        @endforeach

                    </td>
                    <td>


                        <a href="{{ url('multi-record/' . $list->id . '/edit') }}"
                            class="btn btn-sm btn-primary">Edit</a>
                        <!-- <form action="{{ url('multi-record/'.$list->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-primary">Delete</button>
                        </form> -->



                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

    <button type="submit">Delete Selected Data</button>
    </form>

</body>

</html>
