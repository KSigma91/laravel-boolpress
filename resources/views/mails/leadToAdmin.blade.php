<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>
        Salve Admin
    </h4>
    <p>
        C'è un nuovo lead:
    </p>
    <div>
        <b>Name</b>: {{ $lead->name }}<br>
        <b>Email</b>: {{ $lead->email }}<br>
        <b>Message</b>:<br>
        {{ $lead->name }}
        <p>Rispondi al più presto</p>
    </div>
</body>
</html>
