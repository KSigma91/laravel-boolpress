<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>Ciao {{ $lead->name }},</h4>
    <p>
        Abbiamo ricevuto il seguente messaggio:
    </p>
    <p style="font-style: oblique; line-height: 1.4rem">{{ $lead->message }}</p>
    <hr>
    <p>
        Verrai contattato al più presto<br><br>
        Distinti saluti
    </p>
</body>
</html>
