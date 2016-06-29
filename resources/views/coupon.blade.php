<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="eng">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>CSS3 Coupon Voucher</title>

    <link rel="stylesheet" type="text/css" href="css/coupon.css" />
    <link href="http://fonts.googleapis.com/css?family=Inconsolata&amp;v1" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Candal&amp;v1' rel='stylesheet' type='text/css' />

</head>
<body>

<div id="coupon">

    <br>

    <center>

        <h1>{{$couponTitle}}</h1>
        <h2>Use coupon code: {{$couponCode}}</h2>
        <p>Your extra details such as terms & conditions would go here!</p>
        <p>Contact details, phone number, and anything else goes in this area too.</p>

        <input type="button" class="print" onClick="window.print()" value="Print Voucher"/>

    </center>
    <img id="merchantLogo" src="{{$merchantLogoUrl}}">
</div>

</body>
</html>
