<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Your existing styles remain unchanged */

        /* Additional custom styles */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        .sidebar{
            background-color: rgba(7, 7, 7, 0.8); /* Set a semi-transparent background color */
    -webkit-backdrop-filter: blur(10px); /* Apply a blur effect to the background */
    backdrop-filter: blur(10px);
            height:100vh;
        }
        #cont{
            float: right;
        }
        .nav-item{
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
            background-color: rgb(38, 38, 80);
            width: 30vh;
            margin-top: 20px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->

    <div class="container-fluid d-flex flex-row">
        <div class="row sidebar navbar-collapse">
            <!-- Sidebar -->
            <nav class="navbar-expand-lg col-md-3 col-lg-2 d-md-block fixed-top" id="sidebar">
                <h4 style="color: #ffffff;"><i class="fas fa-user"></i>Doctor Panel</h4>
                <ul class="nav d-flex flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('add_symptoms')"><i class="fas fa-plus"></i>Add Symptoms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('manage_patients')"><i class="fas fa-users"></i>Manage Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('view_symptoms')"><i class="fas fa-eye"></i>View Symptoms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('prescribe_medication')"><i class="fas fa-prescription-bottle"></i>Prescribe
                            Medication</a>
                    </li>
                </ul>
            </nav>

</div>
            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="content" style="background-color: aliceblue;">
                <h2 class="mb-4">Welcome to the Doctor Panel</h2>
                <p>Please select an action from the sidebar.</p>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        function showContent(action) {
            const contentElement = document.getElementById('content');
            contentElement.classList.remove('fade-in');

            switch (action) {
                case 'add_symptoms':
                    populatePatientsName();
                contentElement.innerHTML = `
                <h2 class="mb-4">Add Symptoms</h2>
            <form class="needs-validation">
                <div class="form-group">
                <select class="form-control" id="patientSelect">
                </select>
                    <label>Select Symptoms (related to STIs):</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="painful_urination" id="painful_urination">
                        <label class="form-check-label" for="painful_urination">
                            <i class="bi bi-check-square"></i> Painful Urination
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="abnormal_discharge" id="abnormal_discharge">
                        <label class="form-check-label" for="abnormal_discharge">
                            <i class="bi bi-check-square"></i> Abnormal Discharge
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="pain_during_sex" id="pain_during_sex">
                        <label class="form-check-label" for="pain_during_sex">
                            <i class="bi bi-check-square"></i> Pain During Sex
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="abdominal_pain" id="abdominal_pain">
                        <label class="form-check-label" for="abdominal_pain">
                            <i class="bi bi-check-square"></i> Abdominal Pain
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="abnormal_bleeding_women"
                            id="abnormal_bleeding_women">
                        <label class="form-check-label" for="abnormal_bleeding_women">
                            <i class="bi bi-check-square"></i> Abnormal Bleeding (Women)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="sore_throat" id="sore_throat">
                        <label class="form-check-label" for="sore_throat">
                            <i class="bi bi-check-square"></i> Sore Throat
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="swelling_testicles" id="swelling_testicles">
                        <label class="form-check-label" for="swelling_testicles">
                            <i class="bi bi-check-square"></i> Swelling of Testicles (Men)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="rash_palms_soles" id="rash_palms_soles">
                        <label class="form-check-label" for="rash_palms_soles">
                            <i class="bi bi-check-square"></i> Rash on Palms or Soles
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="flu_like_symptoms" id="flu_like_symptoms">
                        <label class="form-check-label" for="flu_like_symptoms">
                            <i class="bi bi-check-square"></i> Flu-like Symptoms
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="genital_warts" id="genital_warts">
                        <label class="form-check-label" for="genital_warts">
                            <i class="bi bi-check-square"></i> Genital Warts
                        </label>
                    </div>
                    <!-- Add more checkboxes with icons for other symptoms -->
                </div>
                <button type="submit" class="btn btn-primary" onclick="predictSTI()">
                    <i class="bi bi-plus"></i> Add Symptoms
                </button>
            </form>
                `;
                break;
                case 'manage_patients':
                    case 'manage_patients':
    fetch('getPatients.php') // Replace with the correct endpoint
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Build HTML content based on the retrieved data
            contentElement.innerHTML = `
                <h2 class="mb-4">Manage Patients</h2>
                <button class="btn btn-success mb-3" onclick="showContent('add_patient')">Add New Patient</button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${data.map(patient => `
                            <tr>
                                <td>${patient.id}</td>
                                <td>${patient.name}</td>
                                <td>${patient.email}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="editPatient(${patient.id})">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deletePatient(${patient.id})">Delete</button>
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            `;
        })
        .catch(error => {
            console.error('Error fetching patient data:', error);
            // Handle the error, for example, display an error message to the user
            contentElement.innerHTML = `<p>Error fetching patient data: ${error.message}</p>`;
        });
break;
                case 'view_symptoms':
                    contentElement.innerHTML = `
                        <h2 class="mb-4">View Symptoms</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Symptom ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Fever</td>
                                </tr>
                                <!-- Add more rows for additional symptoms -->
                            </tbody>
                        </table>
                    `;
                    break;
                case 'prescribe_medication':
                    contentElement.innerHTML = `
                        <h2 class="mb-4">Prescribe Medication</h2>
                        <form class="needs-validation">
                            <div class="form-group">
                                <label for="medicationName">Medication Name:</label>
                                <input type="text" class="form-control" id="medicationName" name="medicationName"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="dosage">Dosage:</label>
                                <input type="text" class="form-control" id="dosage" name="dosage" required>
                            </div>
                            <button type="submit" class="btn btn-success">Prescribe Medication</button>
                        </form>
                    `;
                    break;
                case 'add_patient':
                    contentElement.innerHTML = `
                    <h2 class="mb-4">Add New Patient</h2>
<form class="needs-validation" action="addPatient.php" method="POST">
    <div class="form-group">
        <label for="patientName">Patient Name:</label>
        <input type="text" class="form-control" id="patientName" name="patientName" required>
    </div>
    <div class="form-group">
        <label for="patientEmail">Patient Email:</label>
        <input type="email" class="form-control" id="patientEmail" name="patientEmail" required>
    </div>
    <div class="form-group">
        <label for="patientAge">Patient Age:</label>
        <input type="number" class="form-control" id="patientAge" name="patientAge" required min="0">
    </div>
    <button type="submit" class="btn btn-primary">Add Patient</button>
</form>

                    `;
                    break;
                default:
                    contentElement.innerHTML = `
                        <h2 class="mb-4">Welcome to the Doctor Panel</h2>
                        <p>Please select an action from the sidebar.</p>
                    `;
            }

            contentElement.classList.add('fade-in');
        }

        function editPatient(patientId) {
            // Logic for editing patient
            alert('Editing patient with ID ' + patientId);
        }

        function deletePatient(patientId) {
            // Logic for deleting patient
            alert('Deleting patient with ID ' + patientId);
        }
        function populatePatientsName()
        {
            fetch('getPatients.php') // Replace with the correct endpoint
    .then(response => {
        alert(response);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        const selectElement = document.getElementById('patientSelect');

        // Clear existing options
        selectElement.innerHTML = '';

        // Populate options based on retrieved patient data
        data.forEach(patient => {
            const option = document.createElement('option');
            option.value = patient.id; // Set the value to the patient ID or another unique identifier
            option.textContent = patient.name; // Set the text content to the patient name
            selectElement.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error fetching patient data:', error);
        // Handle the error, for example, display an error message to the user
        const errorMessage = document.createElement('p');
        errorMessage.textContent = `Error fetching patient data: ${error.message}`;
        contentElement.innerHTML = '';
        contentElement.appendChild(errorMessage);
    });

        }
        function predictSTI() {
            // Collect selected symptoms
            const symptoms = [];
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            checkboxes.forEach(checkbox => {
                symptoms.push(checkbox.value);
            });

            // Fetch API to send symptoms for prediction
            fetch('http://127.0.0.1:5000/predict_sti', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ symptoms }),
            })
            .then(response => response.json())
            .then(result => {
                // Display the prediction result
                const predictionResultElement = document.getElementById('predictionResult');
                //predictionResultElement.innerHTML = `<p>Prediction: ${result.predicted_sti}</p>`;
                alert(result.predicted_sti);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

</body>

</html>
