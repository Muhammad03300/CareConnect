<?php
session_start(); // Start the session at the beginning

include('connect_db.php'); // Include your database connection file

// Retrieve patient name from the session
$patientName = isset($_SESSION['patient_name']) ? $_SESSION['patient_name'] : null;

// Retrieve previous appointments for the patient from the appointment table
$previousAppointmentsQuery = "SELECT id, date, start_time, end_time, doctor_name, status FROM appointments WHERE patient_name = '$patientName' AND NOW() > end_time AND CURDATE() >= date";
$previousAppointmentsResult = mysqli_query($conn, $previousAppointmentsQuery);

// Check if the query was successful
if ($previousAppointmentsResult) {
    // Fetch the list of previous appointments into an array
    $previousAppointments = mysqli_fetch_all($previousAppointmentsResult, MYSQLI_ASSOC);
} else {
    // Handle the case where the query fails
    die("Error fetching previous appointments: " . mysqli_error($conn));
}

include('header-patient.php'); // Include your header file
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
        margin-top: 20px;
    }

    table {
        width: 100%;
        margin-bottom: 20px;
        background-color: #fff;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #383c44;
        color: #fff;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Previous Appointments</h2>
        <?php
        if ($previousAppointments) {
            // Display previous appointments in a table
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Date</th>';
            echo '<th>Time</th>';
            echo '<th>Doctor</th>';
            echo '<th>Action</th>'; // New column for action
            echo '<th>Status</th>'; // New column for status
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($previousAppointments as $appointment) {
                echo '<tr>';
                echo '<td>' . $appointment['date'] . '</td>';
                echo '<td>' . $appointment['start_time'] . ' - ' . $appointment['end_time'] . '</td>';
                echo '<td>' . $appointment['doctor_name'] . '</td>';
                
                // Action column with a delete button and confirmation dialog
                echo '<td><a href="javascript:void(0);" onclick="confirmDelete(' . $appointment['id'] . ')">Delete</a></td>';
                
                // Status column to show missed or attended
                $status = ($appointment['status']) ? 'Missed' : 'Attended';
                echo '<td>' . $status . '</td>';
                
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            // No previous appointments
            echo '<p>No previous appointments.</p>';
        }
        ?>
    </div>
    <script>
    function confirmDelete(appointmentId) {
        var confirmDelete = confirm("Are you sure you want to delete this appointment?");
        if (confirmDelete) {
            window.location.href = 'delete-appointment-patient.php?id=' + appointmentId;
        }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>