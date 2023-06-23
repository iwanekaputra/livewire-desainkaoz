<!DOCTYPE html>
<html>
<head>
    <title>desainkaoz</title>
</head>
<body>
    <h1>Email Verification Mail</h1>

    Please verify your email with bellow link:
    <a href="{{ route('user.verify', $details['token']) }}">Verify Email</a>
</body>
</html>
