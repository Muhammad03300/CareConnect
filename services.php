<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .jumbotron {
            background-image: url('services.jpg');
            background-size: cover;
            background-attachment: fixed; /* Fix the background image */
            background-position: center;
            color: white;
            padding: 80px 25px;
            margin-bottom: 0;
        }

        .service-description {
            margin: 20px 0;
        }

        .service-image {
            border-radius: 50%;
            max-width: 100%;
            height: auto;
        }
    </style>

    <title>Medical Services</title>
</head>

<body>
    <div class="mb-3">
    <?php include('header.php'); ?>
    </div>    
    <div class="jumbotron text-center">
        <h1 class="display-4">Medical Services</h1>
        <p class="lead">Providing Quality Healthcare with Expert Doctors</p>
    </div>

    <div class="container">
        <!-- Physician Service -->
        <div class="service-description">
            <h2>Physician Service</h2>
            <p>
                Our experienced team of physicians is dedicated to providing personalized and comprehensive healthcare services. We focus on preventive care and the overall well-being of our patients.
            </p>
            <p>
                For more information or to schedule an appointment with one of our physicians, <a href="contact.php">contact us</a>.
            </p>
        </div>

        <!-- Neurologist Service -->
        <div class="service-description">
            <h2>Neurologist Service</h2>
            <p>
                Our neurology specialists offer state-of-the-art care for a wide range of neurological conditions. From diagnostic services to personalized treatment plans, we are committed to delivering the highest quality of care.
            </p>
            <p>
                For more information or to schedule an appointment with one of our neurologists, <a href="contact.php">contact us</a>.
            </p>
        </div>

        <!-- Cardiologist Service -->
        <div class="service-description">
            <h2>Cardiologist Service</h2>
            <p>
                Our cardiologists specialize in providing expert care for heart-related issues and cardiovascular health. We offer comprehensive cardiac services, including diagnostic testing, intervention, and long-term management.
            </p>
            <p>
                For more information or to schedule an appointment with one of our cardiologists, <a href="contact.php">contact us</a>.
            </p>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</body>

</html>
