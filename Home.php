<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <title>Bootstrap Navbar</title>
    <style>
       body {
        background-color: #f2f2f2; /* Light gray background color */
    }

    /* Custom styles for the navbar */
    .navbar {
        background-color: #343a40;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .navbar-brand {
        color: #ffffff;
        font-weight: bold;
        font-size: 28px;
    }

    .navbar-nav .nav-link {
        color: #007bff;
        font-size: 20px;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:last-child {
        margin-right: 0; /* Remove margin from the last link */
    }

    .navbar-nav .nav-link:hover {
        color: blue;
        background-color: #222;
        border-radius: 5px;
    }

    /* Custom padding for the links */
    .navbar-nav .nav-link {
        padding: 10px 30px !important; /* Add padding around links (top and bottom: 10px, left and right: 30px) */
    }

    .form-control {
        margin-top: 10px;
        padding: 10px;
        font-family: 'Courier New', monospace;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd; /* Add a border around the table */
    }

    th, td {
        border: 1px solid #ddd; /* Add a border around table cells */
        padding: 8px; /* Add some padding to the cells for spacing */
        text-align: left; /* Align text to the left within cells */
    }

    th {
        background-color: #f2f2f2; /* Add a background color to table headers */
    }
    </style>
</head>
<body>
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "terminologydb";
$servername = "192.168.0.21";
$username = "root";
$password = "Adm1n123";
$database = "glossarydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for search
$searchQuery = '';
$results = [];

if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
    // Perform a database query based on the search query
    $sql = "SELECT * FROM terminologies WHERE german LIKE '%$searchQuery%'
            OR french LIKE '%$searchQuery%'
            OR arabic LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch and store the results in an array
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}

?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="/Translator_tool/Home.php"><span style=>S</span>earch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/Translator_tool/Export.php">Export</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/Translator_tool/Add.php">Add</a>
                        </li>
                    </ul>
                </div>

                <a class="navbar-brand" href="#" style="padding-left: 10rem;">Border Glossary Management System</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <br>
    <br>
    <!-- Page Content -->
    <div class="container">
        <!-- Normal Width Search Box -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Search A German Word..." aria-label="Search" aria-describedby="search-button">
                        <div class="input-group-append ms-2"> <!-- Add margin to the left (margin-start) -->
                            <button style="margin-top: 14px;" class="btn btn-primary" type="submit" id="search-button">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br>
        <br>

        <?php if (!empty($results)) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">German</th>
                    <th scope="col">French</th>
                    <th scope="col">Arabic</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $key => $row) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $row['german'] ?></td>
                    <td><?= $row['french'] ?></td>
                    <td><?= $row['arabic'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else if (isset($_POST['search'])) { ?>
            <div class="alert alert-secondary" role="alert">
    No results found.
</div>

        <?php } ?>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
