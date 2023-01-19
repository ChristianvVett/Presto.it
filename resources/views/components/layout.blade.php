<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Web Shapers">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <title>Presto.it</title>
</head>
<body>
    <x-navbar/>
    
    <div class="wrapper">
        {{$slot}}
    </div>

    <x-footer/>
    @livewireScripts
</body>
</html>