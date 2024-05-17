<?php 
include ('connect_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if it's a chat deletion request
    if (isset($_POST["deleteChat"])) {
        // Delete all chat entries for the current user
        $deleteChatQuery = "DELETE FROM messages WHERE patient_name = '$patientName'";
        $deleteChatResult = mysqli_query($conn, $deleteChatQuery);

        if ($deleteChatResult) {
            echo '<script>alert("Chat deleted successfully!");</script>';
echo '<script>window.location.href = "patient-dashboard.php";</script>';
        } else {
            echo '<script>alert("Error deleting chat: ' . mysqli_error($conn) . '");</script>';
        }
    } else {
        // It's a new appointment scheduling request

        // Get user input
        $appointmentDate = $_POST["appointmentDate"];
        $appointmentTime = $_POST["appointmentTime"];
        $selectedDoctor = $_POST["doctor"];

        // Calculate end time (1 hour later than start time)
        $endTime = date('H:i', strtotime($appointmentTime . ' + 1 hour'));

        // Format the date using DateTime class to 'yyyy-mm-dd'
        $formattedDate = (new DateTime($appointmentDate))->format('Y-m-d');

        // Insert the appointment data into the appointment table
        $insertAppointmentQuery = "INSERT INTO medical_records (patient_name, doctor_name, date, start_time, end_time)
                           VALUES ('$patientName', '$selectedDoctor', '$formattedDate', '$appointmentTime', '$endTime')";

        $insertResult = mysqli_query($conn, $insertAppointmentQuery);

        if ($insertResult) {
            // Appointment successfully scheduled
            echo '<script>alert("Appointment scheduled successfully!");</script>';
            header('patient-dashboard.php');
        } else {
            // Handle the case where the insertion fails
            echo '<script>alert("Error scheduling appointment: ' . mysqli_error($conn) . '");</script>';
        }
    }
}
?>