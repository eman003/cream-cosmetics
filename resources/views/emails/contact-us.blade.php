<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$contact_us['first_name'].' '.$contact_us['last_name']}}</title>
</head>
<body>
@component('mail::message')
    <img src="{{asset('images/logo.png')}}" class="mx-auto">

    {{$contact_us['message']}}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
</body>
</html>
