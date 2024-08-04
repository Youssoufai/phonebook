<!DOCTYPE html>
<html>

<head>
    <title>Welcome to TheIgorDevelopment Group</title>
</head>

<body>
    <h1>Hello {{ $user }} </h1>
    <img src="{{ $message->embed('storage/' . $contact->image) }}" alt="">
</body>

</html>
