<?php
    include('connect_db.php');

    // Define an empty variable for the alert message
    $alertMessage = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user input
        $phoneNumber = $_POST["phone"];
        $password = $_POST["password"];

        // Validate doctor credentials
        $doctorData = validateDoctor($phoneNumber, $password);

        if ($doctorData) {
            // If valid, set the doctor's name in a session variable
            session_start();
            $_SESSION['doctor_name'] = $doctorData['name'];

            // Redirect to upcoming-appointment.php
            header("Location: upcoming-appointment-doctor.php");
            exit();
        } else {
            // If invalid, set the alert message
            $alertMessage = 'Invalid phone number or password.';
        }
    }

    // Function to validate doctor credentials and retrieve user data
    function validateDoctor($phoneNumber, $password) {
        global $conn; // Assuming $conn is your database connection variable

        // Replace the following with your actual database query using mysqli_query
        $query = "SELECT * FROM doctor WHERE contact = '$phoneNumber'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $doctor = mysqli_fetch_assoc($result);

            // Check if the password matches using password_verify
            if ($doctor && password_verify($password, $doctor['password'])) {
                // Password is correct, return user data
                return $doctor;
            }
        }

        // Invalid credentials or user not found
        return false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('login-doctor.jpg'); /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the last parameter for transparency */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }
    </style>
    <title>Login Page</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2>Login</h2>
                    <!-- Display the alert message if it's not empty -->
                    <?php if (!empty($alertMessage)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $alertMessage; ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <div class="mt-3">
                        <p>Don't have an account? <a href="signup-doctor.php">Sign up here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
