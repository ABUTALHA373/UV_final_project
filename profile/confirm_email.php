<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Email Sent</title>
    <!-- Add your CSS styles if needed -->
</head>

<body>
    <div>
        <h1>Confirmation Email Sent</h1>
        <p>A confirmation email has been sent to your email address. Please check your inbox and follow the instructions
            to confirm your email.</p>
        <p><?php echo $_SESSION['msg'] ?></p>
        <!-- Add any additional content or styling as needed -->
    </div>
</body>

</html>