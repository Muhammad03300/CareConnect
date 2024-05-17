<?php
session_start();
include('connect_db.php');

if (isset($_GET['id'])) {
    $appointmentId = $_GET['id'];
    
    // Perform the deletion based on the appointment ID
    $deleteQuery = "DELETE FROM appointments WHERE id = '$appointmentId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Redirect back to the page showing previous appointments
        header('Location: previous-appointments-patient.php');
        exit();
    } else {
        // Handle the case where the deletion fails
        die("Error deleting appointment: " . mysqli_error($conn));
    }
}
?>
