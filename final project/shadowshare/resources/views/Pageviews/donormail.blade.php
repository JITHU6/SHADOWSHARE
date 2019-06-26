<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>

<body>
    <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
        <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
            <span style="font-size:50px; font-weight:bold">Certificate of Donation</span>
            <br><br>
            <span style="font-size:25px"><i>This is to certify that</i></span>
            <br><br>
            <span style="font-size:30px"><b>{!!$name!!}</b></span><br /><br />
            <span style="font-size:25px"><i>has Donated the amount Rs.</i></span> <br /><br />
            <span style="font-size:30px">{!!$amount!!}.</span> <br /><br />
            <span style="font-size:20px">We feel proud of you<b> and we wish you all the best </b></span>
            <br /><br /><br /><br />
            <span style="font-size:25px"><i>dated</i></span><br>
            {!!$date!!}
            <span style="font-size:30px"></span>
        </div>
    </div>
</body>

</html>