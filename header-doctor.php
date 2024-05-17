<?php
    // Start the session
    session_start();

    // Check if the doctor's name is set in the session
    if (isset($_SESSION['doctor_name'])) {
        $doctorName = $_SESSION['doctor_name'];
    } else {
        // Redirect to the login page if the session variable is not set
        header("Location: login-doctor.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Doctor's Dashboard</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 1.5em;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav .nav-item {
            padding: 0px;
        }

        .navbar-nav .nav-item a {
            color: #ffffff;
        }

        .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .dropdown-menu {
            background-color: #007bff;
            border: 1px solid #ffffff; /* Border color */
            border-radius: 0; /* Remove border-radius */
        }

        .dropdown-menu a {
            color: #ffffff;
        }

        .dropdown-menu a:hover {
            background-color: #0056b3; /* Hover background color */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Your Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="upcoming-appointment-doctor.php">Appointments</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="previous-appointments-doctor.php">Previous Appointments</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="doctor-personal-info.php">Personal Information</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php echo 'Dr. ' . $doctorName; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" style="color: black;" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
