<?php
session_start(); // Start the session at the beginning

include('connect_db.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the appointment ID to be canceled
    $appointmentId = $_POST["appointmentId"];

    // Delete the appointment from the database
    $deleteAppointmentQuery = "DELETE FROM appointments WHERE id = '$appointmentId'";
    $deleteResult = mysqli_query($conn, $deleteAppointmentQuery);

    if ($deleteResult) {
        // Appointment successfully canceled
        echo '<script>alert("Appointment canceled successfully!");</script>';
    } else {
        // Handle the case where the deletion fails
        echo '<script>alert("Error canceling appointment: ' . mysqli_error($conn) . '");</script>';
    }
}

// Redirect back to the patient dashboard
header("Location: patient-dashboard.php");
exit();
?>
