<?php
include('connect_db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form values
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $emergencyName = $_POST['ename'];
    $relationship = $_POST['erelation'];
    $emergencyContact = $_POST['econtact'];
    $password = $_POST['password'];
    $confpassword = $_POST["confpassword"];

    // Check if password and confirm password match
    if ($password !== $confpassword) {
        echo '<div class="alert alert-danger" role="alert">
                Password and Confirm Password do not match.
              </div>';
    } else {
        // Check if the contact already exists
        $checkContactQuery = "SELECT * FROM patient WHERE contact = '$contact'";
        $checkContactResult = mysqli_query($conn, $checkContactQuery);

        if (mysqli_num_rows($checkContactResult) > 0) {
            echo '<div class="alert alert-danger" role="alert">
                    User with the same contact already exists.
                  </div>';
        } else {
            // Hash the password (use appropriate password hashing in production)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // SQL query to insert data into the database
            $sql = "INSERT INTO patient (name, dob, gender, address, email, contact, e_name, e_relation, e_contact, password)
                    VALUES ('$name', '$dob', '$gender', '$address', '$email', '$contact', '$emergencyName', '$relationship', '$emergencyContact', '$hashedPassword')";

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

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Patient Signup</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
      background: url('singup-patient.jpg') center/cover no-repeat;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0; /* Remove default body margin */
    }

    .container {
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      padding: 20px;
      max-width: 600px; /* Adjust the max-width as needed */
      width: 100%; /* Take up full width on smaller screens */
      margin: auto; /* Center the container */
    }

    .form-group {
      margin-bottom: 20px;
    }

    .btn-signup {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-signup:hover {
      background-color: #45a049;
    }
  </style>

</head>
<body>

<div class="container">
  <h2 class="text-center mb-4">Patient Signup</h2>
  <form action="signup-patient.php" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input name="name" type="text" class="form-control" id="name" required>
    </div>

    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input name="dob" type="date" class="form-control" id="dob" required>
    </div>

    <div class="form-group">
      <label for="gender">Gender:</label>
      <select name="gender" class="form-control" id="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>

    <div class="form-group">
      <label for="address">Address:</label>
      <input name="address" type="text" class="form-control" id="address" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input name="email" type="email" class="form-control" id="email" required>
    </div>

    <div class="form-group">
      <label for="contact">Contact No:</label>
      <input name="contact" type="tel" class="form-control" id="contact" required>
    </div>

    <h3>Emergency Contact</h3>

    <div class="form-group">
      <label for="emergencyName">Name:</label>
      <input name="ename" type="text" class="form-control" id="emergencyName" required>
    </div>

    <div class="form-group">
      <label for="relationship">Relationship:</label>
      <input name="erelation" type="text" class="form-control" id="relationship" required>
    </div>

    <div class="form-group">
      <label for="emergencyContact">Contact No:</label>
      <input name="econtact" type="tel" class="form-control" id="emergencyContact" required>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input name="password" type="password" class="form-control" id="password" required>
    </div>

    <div class="form-group">
      <label for="confirmPassword">Confirm Password:</label>
      <input name="confpassword" type="password" class="form-control" id="confirmPassword" required>
    </div>

    <button type="submit" class="btn btn-signup btn-block">Sign Up</button>
  </form>
  <div class="mt-3 text-center">
    <p>Already have an account? <a href="login-patient.php">Login here</a></p>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
