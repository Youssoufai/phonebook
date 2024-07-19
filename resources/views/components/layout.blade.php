<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen bg-gray-100">
    <nav class="p-9 flex justify-between">
        <div class="text-blue-900 text-2xl">
            My Phone Directory
        </div>
        <ul class="flex gap-4 text-neutral-600">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Login</a>
            </li>
            <li>
                <a href="#">Register</a>
            </li>
        </ul>
    </nav>
    {{ $slot }}
</body>

</html>
