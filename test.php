<?php
// Start the session
session_start();
echo 'Patient Name: ' . $_SESSION['patient_name'] . '<br>';
echo 'Doctor Name: ' . $_SESSION['doctor_name'] . '<br>';
?>
