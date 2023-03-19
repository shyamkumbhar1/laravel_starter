{{print_r($flights[0])}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Flight</title>
</head>

<body>
    <h1> Search Fligths Data</h1>
    <table class="table table-striped" id="policy_reports" border=1>
        <thead>
            <tr>
                <th scope="col">airline/th>
                <th scope="col">airlineCode</th>
                <th scope="col">flightNumber</th>
                <th scope="col">origin</th>
                <th scope="col">availableSeats</th>
                <th scope="col">destination</th>
                <th scope="col">price</th>
                <th scope="col">departure</th>
                <th scope="col">arrival</th>
                <th scope="col">duration</th>
                <th scope="col">operationalDays</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($flights as $key => $values)
            <tr>
                <td>{{ $values['airline'] }}</td>
                <td>{{ $values['airlineCode'] }}</td>
                <td>{{ $values['flightNumber'] }}</td>
                <td>{{ $values['origin'] }}</td>
                <td>{{ $values['availableSeats'] }}</td>
                <td>{{ $values['destination'] }}</td>
                <td>{{ $values['price'] }}</td>
                <td>{{ $values['departure'] }}</td>
                <td>{{ $values['arrival'] }}</td>
                <td>{{ $values['duration'] }}</td>
                <td>

                    @foreach ($values['operationalDays'] as $key => $values)
                    {{ $values }}
                    @endforeach


                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>