<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('about.jpg');
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            flex-direction: column; /* Stack containers vertically */
            align-items: center;
            justify-content: space-between; /* Align items to the top and bottom */
            min-height: 100vh; /* Ensure a minimum height of the viewport */
            margin: 0;
        }

        .doctor-container {
            padding: 50px 20px;
            text-align: center;
        }

        .doctor-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            margin: 20px;
            background-color: #fff;
        }

        .doctor-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .doctor-details {
            padding: 20px;
        }

        .about-section {
            padding: 30px 0;
        }

        .section-title {
            margin-bottom: 20px;
        }

        .contact-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .contact-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .doctor-card {
                margin: 20px 0;
            }
        }

        .footer {
            color: white;
            text-align: center;
            width: 100%;
        }
    </style>

    <title>Doctor About Page</title>
</head>

<body>
    <div>
    <?php include('header.php'); ?>
    </div>
    <div class="container doctor-container mt-4">
        <h1 style="color:white">Meet Our Doctors</h1>

        <div class="row">
            <!-- Doctor 1 -->
            <div class="col-md-12 col-lg-4">
                <div class="card doctor-card">
                    <img src="doctor.png" alt="Doctor Image" class="doctor-image">
                    <div class="doctor-details">
                        <h5 class="card-title">Dr. John Doe</h5>
                        <p class="card-text">Specialization: Cardiologist</p>
                    </div>
                </div>
            </div>

            <!-- Doctor 2 -->
            <div class="col-md-12 col-lg-4">
                <div class="card doctor-card">
                    <img src="female-doctor-icon.png" alt="Doctor Image" class="doctor-image">
                    <div class="doctor-details">
                        <h5 class="card-title">Dr. Jane Smith</h5>
                        <p class="card-text">Specialization: Dermatologist</p>
                    </div>
                </div>
            </div>

            <!-- Doctor 3 -->
            <div class="col-md-12 col-lg-4">
                <div class="card doctor-card">
                    <img src="doctor.png" alt="Doctor Image" class="doctor-image">
                    <div class="doctor-details">
                        <h5 class="card-title">Dr. Mark Johnson</h5>
                        <p class="card-text">Specialization: Neurologist</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php include('footer.php'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
