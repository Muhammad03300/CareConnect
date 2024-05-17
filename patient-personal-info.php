<?php
include('connect_db.php');
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

    .personal-info-container {
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
      <div class="personal-info-container">
        <h3>Personal Information</h3>

        <div class="card">
          <div class="card-header">
            General Information
          </div>
          <div class="card-body">
            <!-- Add content for general information -->
            <p>
              Name: John Doe<br>
              Date of Birth: January 1, 1980<br>
              Gender: Male<br>
              Address: 123 Main Street, Cityville<br>
              Contact Number: (555) 123-4567<br>
              Email: john.doe@example.com
            </p>
          </div>
        </div>


        <div class="card">
          <div class="card-header">
            Emergency Contact
          </div>
          <div class="card-body">
            <!-- Add content for emergency contact -->
            <p>
              Name: Jane Doe (Spouse)<br>
              Relationship: Spouse<br>
              Contact Number: (555) 987-6543
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
