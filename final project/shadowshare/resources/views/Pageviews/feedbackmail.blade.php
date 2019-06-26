<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>

<body>
    <h3>hello i am {!!$name!!}</h3>

    <p>{!!$messages!!}</p>
    @if($phone)
    <p>{!!$phone!!}</p>
    @endif
</body>

</html>