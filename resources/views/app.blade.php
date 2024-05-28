<!DOCTYPE html>
<html>
<head>
    <title>Botikatest</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js')
</head>
<body>
    @inertia
</body>
</html>
