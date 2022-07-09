<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>speedcube.site</title>

        <x-styles />
    </head>
    <body>
        {{ $slot }}

        <x-script src="global.ts" />
    </body>
</html>
