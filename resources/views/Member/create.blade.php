<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Add Member</h1>
    <form action="{{ route('member.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <label for="ParentId"></label>

        <select name="ParentId" id="ParentId">
            <option value="volvo">Volvo</option>
            <option value="volvo">dsdsd
                
            </option>

        </select>
        <button type="submit">Submit</button>
    </form>

</body>

</html>
