<?php
session_start(); // Start the session at the beginning

include('connect_db.php'); // Include your database connection file

// Retrieve the list of doctors from the doctor table
$doctorListQuery = "SELECT name FROM doctor";
$doctorListResult = mysqli_query($conn, $doctorListQuery);
$patientName = isset($_SESSION['patient_name']) ? $_SESSION['patient_name'] : null;

// Retrieve upcoming appointments for the patient from the appointment table
$upcomingAppointmentsQuery = "SELECT * FROM appointments WHERE patient_name = '$patientName' AND CURDATE() <= date";
$upcomingAppointmentsResult = mysqli_query($conn, $upcomingAppointmentsQuery);

// Fetch messages from the messages table
$messagesQuery = "SELECT * FROM messages WHERE patient_name = '$patientName'";
$messagesResult = mysqli_query($conn, $messagesQuery);

// Check if there are messages
if ($messagesResult) {
    $messages = mysqli_fetch_all($messagesResult, MYSQLI_ASSOC);
} else {
    // Handle the case where the query fails
    die("Error fetching messages: " . mysqli_error($conn));
}

// Check if the query was successful
if ($doctorListResult) {
    // Fetch the list of doctors into an array
    $doctorList = mysqli_fetch_all($doctorListResult, MYSQLI_ASSOC);
} else {
    // Handle the case where the query fails
    die("Error fetching doctor list: " . mysqli_error($conn));
}

// Initialize $upcomingAppointments
$upcomingAppointments = array();

// Check if the form is submitted for scheduling a new appointment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['appointmentDate']) && isset($_POST['appointmentTime']) && isset($_POST['doctor'])) {
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $doctorName = $_POST['doctor'];
    
    // Prepare the start and end times for the appointment
    $startTime = date("H:i:s", strtotime($appointmentTime));
    $endTime = date("H:i:s", strtotime($appointmentTime . ' +30 minutes')); // Assuming 30 minutes appointments
    
    // Insert the new appointment into the appointments table
    $insertAppointmentQuery = "INSERT INTO appointments (patient_name, doctor_name, date, start_time, end_time) VALUES ('$patientName', '$doctorName', '$appointmentDate', '$startTime', '$endTime')";
    
    if (mysqli_query($conn, $insertAppointmentQuery)) {
        echo "<div class='alert alert-success' role='alert'>Appointment scheduled successfully!</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error scheduling appointment: " . mysqli_error($conn) . "</div>";
    }
}

// Include the header
include('header-patient.php');
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

    .dashboard {
        padding: 20px;
    }

    .card {
        margin-bottom: 20px;
    }

    #chat {
        max-height: 200px;
        overflow-y: auto;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="dashboard">
                    <!-- Your existing dashboard content -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="dashboard">
                    <div class="card">
                        <div class="card-header">
                            Upcoming Appointments
                        </div>
                        <div class="card-body">
                            <?php
                            if ($upcomingAppointmentsResult) {
                                // Fetch the upcoming appointments into an array
                                $upcomingAppointments = mysqli_fetch_all($upcomingAppointmentsResult, MYSQLI_ASSOC);
                            }
                            if (!empty($upcomingAppointments)) {
                                // Iterate through and display upcoming appointments
                                foreach ($upcomingAppointments as $appointment) {
                                    echo "<p>Time: {$appointment['start_time']} - {$appointment['end_time']}<br>";
                                    echo "Date: {$appointment['date']}<br>";
                                    echo "Doctor: {$appointment['doctor_name']}</p>";

                                    // Check if the current time is within the start and end time of the appointment
                                    date_default_timezone_set("Asia/Karachi");
                                    $currentTime = date('H:i');
                                    $startTime = $appointment['start_time'];
                                    $endTime = $appointment['end_time'];

                                    // Format the date using DateTime class to 'yyyy-mm-dd'
                                    $formattedAppointmentDate = (new DateTime($appointment['date']))->format('Y-m-d');
                                    $currentDate = date('Y-m-d');

                                    if ($currentDate == $formattedAppointmentDate) {
                                        // Show the "Attend Appointment" button only if it's the same day as the appointment
                                        echo '<form action="appointment-submit.php" method="post" enctype="multipart/form-data">';
                                        echo "<input type='hidden' name='appointmentId' value='{$appointment['id']}'>";
                                        echo "<input type='hidden' name='doctorName' value='{$appointment['doctor_name']}'>"; // Add this line
                                        echo "<button type='submit' class='btn btn-success'>Attend Appointment</button>";
                                        echo "</form>";
                                    } elseif ($currentTime > $startTime && $currentTime < $endTime) {
                                        // Show the "Attend Appointment" button for appointments on different days but within the time range
                                        echo "<form action='appointment-submit.php' method='post' enctype='multipart/form-data'>";
                                        echo "<input type='hidden' name='appointmentId' value='{$appointment['id']}'>";
                                        echo "<input type='hidden' name='doctorName' value='{$appointment['doctor_name']}'>";
                                        echo "<button type='submit' class='btn btn-success'>Attend Appointment</button>";
                                        echo "</form>";

                                    } else {
                                        // Show the Cancel Appointment button with a unique identifier for each appointment
                                        echo "<form action='cancel-appointment-patient.php' method='post' onsubmit='return confirmCancel()'>";
                                        echo "<input type='hidden' name='appointmentId' value='{$appointment['id']}'>";
                                        echo "<button type='submit' class='btn btn-danger'>Cancel Appointment</button>";
                                        echo "</form>";
                                    }
                                }
                            } else {
                                // No upcoming appointments
                                echo "No upcoming appointments.";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Schedule New Appointment
                        </div>
                        <div class="card-body">
                            <!-- Add content for scheduling new appointments -->
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label for="appointmentDate">Appointment Date:</label>
                                    <input type="date" class="form-control" name="appointmentDate" id="appointmentDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="appointmentTime">Appointment Time:</label>
                                    <input type="time" class="form-control" name="appointmentTime" id="appointmentTime" required>
                                </div>
                                <div class="form-group">
                                    <label for="doctor">Select Doctor:</label>
                                    <div class="form-group">
                                        <select class="form-control" name="doctor" id="doctor" required>
                                            <?php
                                            // Iterate through the list of doctors and create options
                                            foreach ($doctorList as $doctor) {
                                                echo "<option value='{$doctor['name']}'>{$doctor['name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Schedule Appointment</button>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Message Doctor
                        </div>
                        <div class="card-body">
                            <!-- Add content for messaging the doctor -->
                            <form action="message-doctor-submit.php" method="post">
                                <div class="form-group">
                                    <label for="message">Your Message:</label>
                                    <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="messageDoctor">Select Doctor:</label>
                                    <select class="form-control" name="messageDoctor" id="messageDoctor" required>
                                        <?php
                                        // Iterate through the list of doctors and create options
                                        foreach ($doctorList as $doctor) {
                                            echo "<option value='{$doctor['name']}'>{$doctor['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Chat History
                        </div>
                        <div class="card-body" id="chat">
                            <?php
                            if ($messages) {
                                // Display chat messages
                                foreach ($messages as $message) {
                                    echo "<p> {$message['message']}</p>";
                                }
                                // Add the button to delete the chat
                                echo '<form action="patient-dashboard.php" method="post">';
                                echo '<button type="submit" name="deleteChat" class="btn btn-danger">Delete Chat</button>';
                                echo '</form>';
                            } else {
                                // No chat messages
                                echo "No chat messages.";
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
    function confirmCancel() {
        return confirm("Are you sure you want to cancel this appointment?");
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
