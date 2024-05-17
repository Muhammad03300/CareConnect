<?php
include('header-doctor.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Previous Appointments</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Previous Appointments</h2>

        <!-- Appointment Cards in Vertical Direction -->
        <div class="row">
            <div class="col-md-12">
                <!-- First Card -->
                <section class="card">
                    <div class="card-header">
                        <h5 class="card-title">Appointment Details</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Patient:</strong> John Doe</p>
                        <p class="card-text"><strong>Date:</strong> January 15, 2023</p>
                        <p class="card-text"><strong>Time:</strong> 2:00 PM - 3:00 PM</p>
                        <a href="#" class="btn btn-danger" onclick="deleteAppointment(1)">Delete</a>
                    </div>
                </section>

                <!-- Second Card -->
                <section class="card">
                    <div class="card-header">
                        <h5 class="card-title">Appointment Details</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Patient:</strong> Jane Smith</p>
                        <p class="card-text"><strong>Date:</strong> February 10, 2023</p>
                        <p class="card-text"><strong>Time:</strong> 3:30 PM - 4:30 PM</p>
                        <a href="#" class="btn btn-danger" onclick="deleteAppointment(2)">Delete</a>
                    </div>
                </section>

                <!-- Third Card with Sample Data -->
                <section class="card">
                    <div class="card-header">
                        <h5 class="card-title">Appointment Details</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Patient:</strong> Mark Johnson</p>
                        <p class="card-text"><strong>Date:</strong> March 5, 2023</p>
                        <p class="card-text"><strong>Time:</strong> 10:00 AM - 11:00 AM</p>
                        <a href="#" class="btn btn-danger" onclick="deleteAppointment(3)">Delete</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function deleteAppointment(appointmentId) {
            // Add your logic here to delete the appointment with the specified ID
            alert("Deleting appointment with ID: " + appointmentId);
        }
    </script>

</body>

</html>
