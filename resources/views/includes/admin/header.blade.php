{{--page header--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--gets the title from the page calling this--}}
    <title>@yield('title')</title>
    {{--compiled css--}}
    <link rel="stylesheet" href="/questionnaires/css/app.css" />
    {{--compiled javascript--}}
    <script src="/questionnaires/js/app.js"></script>
</head>
<body>

{{--gets the admin navigation--}}
@include('includes.admin.nav')
<article>