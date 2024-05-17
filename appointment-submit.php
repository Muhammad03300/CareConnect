<?php
include('header-patient.php');
include('connect_db.php'); 
ini_set('upload_max_filesize', '10M'); 
ini_set('post_max_size', '10M');

session_start();

if (isset($_POST['doctorName'])) {
  $appointmentId = $_POST['appointmentId'];
  $doctorName = $_POST['doctorName'];
  $patientName = $_SESSION["patient_name"];
} else {
  echo "Error occurred";
  exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['temperature']) && isset($_POST['blood_pressure']) && isset($_POST['problems']) && isset($_POST['tests'])) {
    // Process other form fields
    $temperature = $_POST['temperature'];
    $blood_pressure = $_POST['blood_pressure'];
    $problems = $_POST['problems'];
    $tests = $_POST['tests'];

    // Process file upload
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["records"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["records"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["records"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now store the file path in the database
            $filePath = $targetFile;

            // Insert data into the database using prepared statements
            $stmt = $conn->prepare("INSERT INTO medical_record (patient_name, doctor_name, problem, temprature, blood_pressure, requested_tests, records) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $patientName, $doctorName, $problems, $temperature, $blood_pressure, $tests, $filePath);

            if ($stmt->execute()) {
                echo "Record added successfully.";
                // Redirect to a success page
                header('Location: appointment-submit.php');
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, your file was not uploaded.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 50px;
    }

    .form-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-submit {
      width: 100%;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="form-container">
        <h2 class="text-center">Submit Records and Problems</h2>
        <form action="appointment-submit.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="temperature">Temperature:</label>
            <input type="text" class="form-control" id="temperature" name="temperature" required>
          </div>

          <div class="form-group">
            <label for="blood_pressure">Blood Pressure:</label>
            <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" required>
          </div>

          <div class="form-group">
            <label for="problems">Describe Your Problems:</label>
            <textarea class="form-control" id="problems" name="problems" rows="4" required></textarea>
          </div>

          <div class="form-group">
            <label for="tests">Requested Tests:</label>
            <input type="text" class="form-control" id="tests" name="tests" required>
          </div>

          <div class="form-group">
            <label for="records">Upload Records:</label>
            <input type="file" class="form-control-file" id="records" name="records">
          </div>

          <input type="hidden" name="doctorName" value="<?php echo htmlspecialchars($doctorName); ?>">
          <input type="hidden" name="appointmentId" value="<?php echo htmlspecialchars($appointmentId); ?>">

          <button type="submit" class="btn btn-dark btn-submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
