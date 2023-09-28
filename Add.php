
<?php
// Include config file to establish a database connection
require_once "config.php"; // Make sure this file exists and contains the database connection code
session_start();
// Define variables and initialize with empty values
$german = $french = $arabic = "";
$german_err = $french_err = $arabic_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate German
    $input_german = trim($_POST["german"]);
    if (empty($input_german)) {
        $german_err = "Please enter a German term.";
    } else {
        $german = $input_german;
    }

    // Validate French
    $input_french = trim($_POST["french"]);
    if (empty($input_french)) {
        $french_err = "Please enter a French term.";
    } else {
        $french = $input_french;
    }

    // Validate Arabic
    $input_arabic = trim($_POST["arabic"]);
    if (empty($input_arabic)) {
        $arabic_err = "Please enter an Arabic term.";
    } else {
        $arabic = $input_arabic;
    }

    // Check input errors before inserting in the database
    if (empty($german_err) && empty($french_err) && empty($arabic_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO terminologies (german, french, arabic) VALUES (?, ?, ?)";

        // Check if the connection is valid
        if ($link) {
            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_german, $param_french, $param_arabic);

                // Set parameters
                $param_german = $german;
                $param_french = $french;
                $param_arabic = $arabic;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Records created successfully. Redirect to the landing page
                    $_SESSION['inserted'] = true;

    // Redirect to the landing page
    header("location: Add.php");
    exit();
} else {
    echo "Oops! Something went wrong. Please try again later.";
}
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Database connection is not valid.";
        }
    }

    // Close connection
    mysqli_close($link);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
         .custom-margin {
     margin-left: 40px; /* Adjust the margin as needed */
 }
 .form-control {
         margin-top: 10px;
         padding: 10px;
         font-family: 'Courier New', monospace;
     }
     </style>
     
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="/Translator_tool/Home.php">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/Translator_tool/Export.php">Export</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/Translator_tool/Add.php">Add</a>
                        </li>
                    </ul>
                </div>


                <a class="navbar-brand" href="#" style="padding-left: 12rem;">Border Glossary Management System</a>


               
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
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" style="display: none;">
        <strong>Success!</strong> Terminology added successfully.
       
    </div>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4">
                <i><h3 style="margin-left: 130px;">German</h3></i>
                <textarea class="form-control" rows="1" name="german" placeholder="German"></textarea>
            </div>
            <div class="col-md-4">
                <i><h3 style="margin-left: 130px;">French</h3></i>
                <textarea class="form-control" rows="1" name="french" placeholder="French"></textarea>
            </div>
            <div class="col-md-4">
                <i><h3 style="margin-left: 130px;" >Arabic</h3></i>
                <textarea class="form-control" rows="1" name="arabic" placeholder="Arabic"></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <button style="margin-left: 0px;" class="btn btn-secondary font-weight-bold" type="submit">Add Terminology</button>
            </div>
        </div>
    </form>
</div>

    
    
    
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
<?php
if (isset($_SESSION['inserted']) && $_SESSION['inserted']) {
    echo "$('#success-alert').show();";
    unset($_SESSION['inserted']); // Clear the session variable
    echo "setTimeout(function() {
        $('#success-alert').fadeOut('slow');
    }, 3000);"; // Hide the alert after 3 seconds (3000 milliseconds)
}
?>
</script>
</body>
</html>

</body>
</html>
