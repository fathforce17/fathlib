<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Application by Fathforce">
        <meta name="author" content="Fathforce">
        <title>{{config('config.general.app_name', config('app.name', 'Fathforce CMS'))}}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="{{ config('config.assets.favicon') }}" type="image/png">

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        @vite(['resources/js/app.js'])
    </head>
    <body class="{{config('config.layout.display')}}">
        <div id="root" class="theme-default">
            <router-view></router-view>
        </div>
        <script src="/js/lang"></script>
    </body>
</html>
