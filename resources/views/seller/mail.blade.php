<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Hi {{$first_name}}</h2>

<div>
  You Are Successfully Registered...Please <a href="{{route('verify.email')}}?token={{$token}}" >Click here</a> to Verify your email

</div>

</body>
</html>
