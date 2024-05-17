<style>
    .custom-navbar {
        background-color: white !important; /* Change the background color to white */
        position: fixed; /* Fix the navbar */
        top: 0;
        width: 100%;
        z-index: 1000; /* Ensure the navbar is above other elements */
    }

    .navbar-brand img {
        max-height: 50px;
        /* Adjust the max-height as needed */
        width: auto;
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light custom-navbar fixed-top">
        <a class="navbar-brand" href="home.php">
            <img src="yourbrand-logo.png" alt="Your Brand Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="doctors.php">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="login-patient.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>