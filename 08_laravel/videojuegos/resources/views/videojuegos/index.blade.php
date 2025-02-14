<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Videojuegos</title>
</head>

<body>
    <h1>Index de videojuegos</h1>
    <?php
   /*  $videojuegos = [['Resident Evil 3', 18, 'Survival Horror'], ['Inazuma Eleven', 3, 'RPG'], ['God of War', 18, 'Hack & Slash']]; */

    ?>
    <table>
        <thead>
            <th>Título</th>
            <th>Pegi</th>
            <th>Género</th>
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
            @php
            @endphp
                <tr>

                    <td>{{ $videojuego -> nombre }}</td>
                    <td>{{ $videojuego -> pegi }}</td>
                    <td>{{ $videojuego -> genero }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
