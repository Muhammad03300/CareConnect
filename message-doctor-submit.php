<?php
session_start();

include('connect_db.php');

// Get user input
$message = isset($_POST['message']) ? $_POST['message'] : '';
$selectedDoctor = isset($_POST['messageDoctor']) ? $_POST['messageDoctor'] : '';
$patientName = isset($_SESSION['patient_name']) ? $_SESSION['patient_name'] : '';

// Insert the message into the messages table
$insertMessageQuery = "INSERT INTO messages (patient_name, doctor_name, message) 
                       VALUES ('$patientName', '$selectedDoctor', '$message')";

$insertResult = mysqli_query($conn, $insertMessageQuery);

if ($insertResult) {
    // Message successfully inserted
echo '<script>window.location.href = "patient-dashboard.php";</script>';
    header('patient-dashboard.php'); // Redirect back to the patient dashboard
} else {
    // Handle the case where the insertion fails
    echo '<script>alert("Error sending
     message: ' . mysqli_error($conn) . '");</script>';
}
?>
