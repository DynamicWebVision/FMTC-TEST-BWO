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
        <p>The terms and conditions for accepting any of our promotions requires that you</p>
        <p>use the coupon within the specified dates and are fully clothed when in our store.</p>

        <input type="button" class="print" onClick="window.print()" value="Print Voucher"/>

    </center>
    <img id="merchantLogo" src="{{$merchantLogoUrl}}">
</div>

</body>
</html>
