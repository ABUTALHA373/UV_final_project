<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        border: 2px solid #f8b600;
        /* Set border color to your primary color */
    }

    .header {
        background-color: #f8b600;
        padding: 20px;
        text-align: center;
        color: #fff;
    }

    .content {
        padding: 20px;
        text-align: center;
    }

    h1 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    p {
        color: #666;
        font-size: 16px;
        margin-bottom: 30px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #f8b600;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .footer {
        background-color: #f4f4f4;
        padding: 20px;
        text-align: center;
    }

    .logo {
        max-width: 100px;
        /* Adjust the logo size */
        margin: 0 auto;
        display: block;
        padding: 5px;
        border-radius: 15px;
        background-color: white;
    }

    a {
        color: white !important;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Reset Password</h2>
        </div>
        <div class="content">
            <h1>Hey {{Username}},</h1>
            <p>You're almost there! Click the button below to reset your password and start using our services.
            </p>
            <a href="http://localhost/fp/verification/confirm_reset_password.php?code={{verification_token}}"
                class="btn">Reset your
                password</a>
        </div>
        <div class="footer">
            <p>&copy; 2024 <a style="color: #f8b600;" href="http://bookitfast.free.nf">Bookitfast</a> - All rights
                reserved.</p>
        </div>
    </div>
</body>

</html>