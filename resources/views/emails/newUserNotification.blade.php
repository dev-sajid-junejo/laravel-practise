<!DOCTYPE html>
<html>
<head>
    <title>New User Registered</title>
</head>
<body>
    <h2>New User Registration Alert 🚀</h2>
    <p>A new user has just registered on your platform.</p>

    <h3>User Details:</h3>
    <ul>
        <li><strong>Name:</strong> {{ $user['name'] }}</li>
        <li><strong>Email:</strong> {{ $user['email'] }}</li>
        <li><strong>Registered At:</strong> {{ now()->format('d M Y, H:i A') }}</li>
    </ul>

    <p>Please review the user details and take necessary actions if needed.</p>

    <p>Regards, <br> Your Application Team</p>
</body>
</html>
