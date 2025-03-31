<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 10px;
        }
        h5 {
            color: #666;
            font-size: 16px;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .password-box {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            margin-top: 15px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Welcome, {{ $user->first_name }}!</h2>
        <h5>Thank you for joining our platform</h5>
        <p>Your new password is:</p>
        <div class="password-box">{{ $newPassword }}</div>
        <p class="footer">If you have any issues, feel free to contact our support team.</p>
    </div>
</body>
</html>
