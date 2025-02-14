<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>
</head>
<body>
    <h1>Lista de consolas</h1>
   {{--  <table>
        <thead>
            <th></th>
        </thead>
    </table> --}}
    <ul>
        @foreach($consolas as $consola)
        <li>{{ $consola-> nombre }}</li>
        @endforeach
    </ul>
</body>
</html>