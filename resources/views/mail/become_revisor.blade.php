<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{__('ui.diventa_revisore')}}</h1>
    <p>{{__('ui.revisor_name')}} {{$user->name}}</p>
    <p>{{__('ui.revisor_mail')}} {{$user->email}}</p>
    <a href="{{route('make.revisor', compact('user'))}}">{{__('ui.rendi_revisore')}}</a>
</body>
</html>