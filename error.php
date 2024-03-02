<!DOCTYPE html>
<?php 

if(isset($_GET['type'])){
    $type =$_GET['type'];
}else{
    $type = '';
}
if(isset($_GET['message'])){
    $message =$_GET['message'];
}else{
    $message = '';
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .error-container {
        text-align: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #d9534f;
    }

    p {
        color: #333;
    }

    a {
        text-decoration: none;
        padding: 1rem;
    }

    h4 {
        padding: 0.5rem 0;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <div class="error-container" style="min-width: 400px; min-height:400px">
        <h1>Error: <?php echo htmlspecialchars($type )?></h1>
        <p><?php echo htmlspecialchars($message) ?></p>
        <a href="index.php">
            <h4 style="color: white; background-color:green">Home</h4>
        </a>
    </div>
</body>

</html>