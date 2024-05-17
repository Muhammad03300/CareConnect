<?php 
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        body {
            background-image: url('doctor-image.jpg');
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .contact-button {
            font-size: 24px;
            padding: 15px 30px;
            border-radius: 30px;
            background-color: white;
            color: black;
            text-decoration: none;
            transition: background-color 0.3s;
            display: inline-block;
            margin-top: 20px; /* Adjust the margin-top as needed */
        }

        .contact-button:hover {
            background-color: #0056b3;
        }

        .button-container {
            margin-top: 20px;
        }

        .title-container {
            margin-bottom: 20px;
            animation: fadeIn 2s; /* Add animation for title */
        }

        .title {
            font-size: 36px;
            color: white;
            opacity: 0; /* Initial opacity for the animation */
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
    <title>Transparent Navbar with Fixed Background</title>
</head>

<body>

    <div class="w3-container w3-center w3-animate-zoom" style="color:white; font-size: 16pt;">
        <h1>Seamless Care, Connected Lives: Welcome to CareConnect!</h1>
        <a href="contact.php" class="btn btn-primary contact-button">Contact Doctor</a>
    </div>

   

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?php 
    include('footer.php');
    ?>
</body>

</html>
