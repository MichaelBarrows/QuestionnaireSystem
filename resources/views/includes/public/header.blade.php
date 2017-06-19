{{--public header--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--gets the title from the page calling it--}}
    <title>@yield('title')</title>
    {{--compiled css--}}
    <link rel="stylesheet" href="/questionnaires/css/app.css" />
    {{--compiled javascript--}}
    <script src="/questionnaires/js/app.js"></script>
</head>
<body>

{{--checks if the user is logged in--}}
@if (Auth::guest())
    {{--user is not logged in--}}
    @include('includes.public.nav')
@else
    {{--user is logged in--}}
    @include('includes.admin.nav')
@endif
<article>