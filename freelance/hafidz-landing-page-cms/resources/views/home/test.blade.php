<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>subtitle</th>
            <th>image</th>
        </tr>
        @foreach ( $heroes as $hero )
            <tr>
                <td>{{$hero}}</td>
                <td>{{$hero->title}}</td>
                <td>{{$hero->subtitle}}</td>
                <td>{{$hero->image}}</td>    
            </tr>
            
        @endforeach
    </table>
</body>
</html>