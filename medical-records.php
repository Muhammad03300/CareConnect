<?php
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

    .records-container {
      padding: 20px;
    }

    .card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="records-container">
        <h3>Medical Records</h3>

        <div class="card">
          <div class="card-header">
            Record 1
          </div>
          <div class="card-body">
            <!-- Add content for medical record 1 -->
            <p>
              Patient: John Doe<br>
              Date: January 15, 2023<br>
              Diagnosis: Common Cold<br>
              Prescription: Rest, Fluids, and over-the-counter medication.
            </p>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            Record 2
          </div>
          <div class="card-body">
            <!-- Add content for medical record 2 -->
            <p>
              Patient: Jane Smith<br>
              Date: February 20, 2023<br>
              Diagnosis: Sprained Ankle<br>
              Prescription: Pain medication, Rest, and Ice.
            </p>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            Record 3
          </div>
          <div class="card-body">
            <!-- Add content for medical record 3 -->
            <p>
              Patient: Mark Johnson<br>
              Date: March 10, 2023<br>
              Diagnosis: Allergic Reaction<br>
              Prescription: Antihistamines and follow-up with an allergist.
            </p>
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
