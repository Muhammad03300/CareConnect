<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Attend Appointment</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Attend Appointment</h2>

        <!-- Patient Information -->
        <div class="card">
            <div class="card-header">
                Patient Information
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="patientName">Patient Name:</label>
                    <input type="text" class="form-control" id="patientName" readonly>
                </div>
                <div class="form-group">
                    <label for="record">Record Submitted:</label>
                    <textarea class="form-control" id="record" readonly></textarea>
                </div>
                <div class="form-group">
                    <label for="problemDescription">Problem Description:</label>
                    <textarea class="form-control" id="problemDescription" readonly></textarea>
                </div>
            </div>
        </div>

        <!-- Tests -->
        <div class="card mt-4">
            <div class="card-header">
                Tests
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="testResults">Test Results:</label>
                    <textarea class="form-control" id="testResults" placeholder="Enter test results"></textarea>
                </div>
            </div>
        </div>

        <!-- Prescription -->
        <div class="card mt-4">
            <div class="card-header">
                Medicine Prescription
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="medicinePrescription">Prescription:</label>
                    <textarea class="form-control" id="medicinePrescription" placeholder="Enter medicine prescription"></textarea>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary mt-4" onclick="submitForm()">Submit</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Fetch data from medical_record table for the specific patient and populate the textboxes
        document.addEventListener("DOMContentLoaded", function() {
            // Assuming you have the patient's ID available
            var patientId = "2"; // Replace this with the actual patient ID

            // AJAX call to fetch patient's data
            $.ajax({
                url: 'fetch_patient_data.php',
                type: 'POST',
                data: { patientId: patientId },
                success: function(response) {
                    // Parse the JSON response
                    var data = JSON.parse(response);

                    // Populate the textboxes with patient's information
                    document.getElementById('patientName').value = data.patientName;
                    document.getElementById('record').value = data.record;
                    document.getElementById('problemDescription').value = data.problemDescription;
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        function submitForm() {
            // Add your logic here to handle form submission, e.g., send data to the server.
            alert("Form Submitted!");
        }
    </script>
</body>

</html>
