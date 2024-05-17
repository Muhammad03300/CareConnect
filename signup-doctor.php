<?php
include('connect_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form values
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $speciality = $_POST['speciality'];
    $experience = $_POST['experience'];
    $licenseNumber = $_POST['license_number'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];
    $address = $_POST['address'];

    // Check if password and confirm password match
    if ($password !== $confpassword) {
        echo '<div class="alert alert-danger" role="alert">
                Password and Confirm Password do not match.
              </div>';
    } else {
        // Check if the contact already exists
        $checkContactQuery = "SELECT * FROM doctor WHERE contact = '$contact'";
        $checkContactResult = mysqli_query($conn, $checkContactQuery);

        if (mysqli_num_rows($checkContactResult) > 0) {
            echo '<div class="alert alert-danger" role="alert">
                    User with the same contact already exists.
                  </div>';
        } else {
            // Hash the password (use appropriate password hashing in production)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // SQL query to insert data into the database
            $sql = "INSERT INTO doctor (name, gender, speciality, experience, license_no, contact, email, password, address)
                    VALUES ('$name', '$gender', '$speciality', '$experience', '$licenseNumber', '$contact', '$email', '$hashedPassword', '$address')";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful
            if ($result) {
                echo '<div class="alert alert-success" role="alert">
                        Account Created Successfully.
                      </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                        Error: ' . mysqli_error($conn) . '
                      </div>';
            }
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('signup-doctor.jpg'); /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .signup-container {
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the last parameter for transparency */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .signup-container input,
        .signup-container select,
        .signup-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        @media (min-width: 768px) {
            /* Apply the margin only on screens larger than 768px (tablets and desktops) */
            .signup-container {
                margin-top: 200px;
            }
        }
    </style>
    <title>Signup Page</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="signup-container">
                    <h2>Signup</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <select name="gender" class="form-control" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="speciality" class="form-control" placeholder="Speciality" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="experience" class="form-control" placeholder="Experience" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="license_number" class="form-control" placeholder="License Number" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="contact" class="form-control" placeholder="Contact" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email"  class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confpassword" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control" placeholder="Address" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Signup</button>
                    </form>
                    <div class="mt-1 text-center">
                         <p>Already have an account? <a href="login-doctor.php">Login here</a></p>
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
