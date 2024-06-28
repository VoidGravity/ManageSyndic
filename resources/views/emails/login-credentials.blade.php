<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Service</title>
</head>
<body>
    <p>Dear {{ $userFullName }},</p>
    <p>Your account has been created successfully. Here are your login credentials:</p>
    <p>Email: {{ $userEmail }}</p>
    <p>Password: {{ $userPassword }}</p>
    <p>Thank you for using our service.</p>
</body>
</html>
