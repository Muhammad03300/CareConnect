<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #343a40;
      color: #fff;
    }

    .navbar-dark .navbar-nav .nav-link {
      color: #fff;
    }

    .navbar-dark .navbar-toggler-icon {
      background-color: #fff;
    }

    .navbar-dark .navbar-toggler {
      border-color: #fff;
    }

    .navbar-brand img {
      max-height: 40px;
    }

    /* Additional CSS for hover effect */
    .nav-item.dropdown:hover .dropdown-menu {
      display: block;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="patient-dashboard.php">
    <img src="yourbrand-logo.png" alt="Logo">
  </a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="patient-dashboard.php">Appointment Management</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="medical-records.php">Medical Records</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="patient-personal-info.php">Personal Information</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="previous-appointments-patient.php">Previous Appointments</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <?php
          // Start the session to access session variables


          // Check if the session variable 'patient_name' is set
          if (isset($_SESSION['patient_name'])) {
              $patientName = $_SESSION['patient_name'];
              echo '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome, ' . $patientName . '
                    </a>';
          } else {
              echo '<a class="nav-link" href="#">Welcome, Guest</a>';
          }
        ?>
        <div class="dropdown-menu" aria-labelledby="userDropdown">
         <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
    </ul>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<!-- Add your content here -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
