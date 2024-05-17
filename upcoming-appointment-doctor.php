<?php
include('header-doctor.php');
include('connect_db.php'); 


// Check if the doctor's session name is set
if(isset($_SESSION["doctor_name"])) {
    $doctorName = $_SESSION["doctor_name"];

    // Query to fetch medical records for the current doctor
    $fetchRecordsQuery = "SELECT * FROM medical_record WHERE doctor_name = '$doctorName'";
    $recordsResult = mysqli_query($conn, $fetchRecordsQuery);

    if(mysqli_num_rows($recordsResult) > 0) {
        // Display the records in the "Now to Attend" section
        $record = mysqli_fetch_assoc($recordsResult);
        $patientName = $record['patient_name'];
        $problem = $record['problem'];
    } else {
        // No records found for the current doctor
        $patientName = "No patient assigned";
        $problem = "No Problem";
    }
} else {
    // Redirect or handle the case when the doctor's session name is not set
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Doctor's Appointment Management</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .chat-box {
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="dashboard">
                    <h4>Doctor's Dashboard</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Now to Attend</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Upcoming Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Patient Messages</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="dashboard">
                    <div class="card">
                        <div class="card-header">
                            Now to Attend
                        </div>
                        <div class="card-body" id="current-appointment">
                            <!-- Display current appointment information -->
                            <strong>Patient:</strong> <?php echo $patientName; ?><br>
                            <strong>Problem:</strong> <?php echo $problem; ?><br>
                            <a class="btn btn-primary" href="appointment-attend-doctor.php">Attend</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Upcoming Appointments
                        </div>
                        <div class="card-body" id="upcoming-appointments">
                            <!-- Add content for upcoming appointments -->
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <!-- Display upcoming appointments -->
                                </li>
                                <!-- Add more upcoming appointments as needed -->
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Patient Messages
                        </div>
                        <div class="card-body chat-box" id="chat">
                            <!-- Add content for patient messages -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
