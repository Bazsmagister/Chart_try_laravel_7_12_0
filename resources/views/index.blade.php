<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <ul>
            @foreach($users as $user)
            <li>
                {{$user->name}} ||
                {{$user->created_at}}
                <hr>
            </li>
            @endforeach
        </ul>
    </div>


    {{-- {{$user}} --}}

</body>

</html>
