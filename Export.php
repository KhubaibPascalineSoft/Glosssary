


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <title>Bootstrap Navbar</title>
    <style>
        body {
         background-color: #f2f2f2;
     }
        
       
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
             margin-right: 0; 
         }
     
         .navbar-nav .nav-link:hover {
         color: blue;
         background-color: #222;
         border-radius: 5px;
     }
     
        
         .navbar-nav .nav-link {
             padding: 10px 30px !important;
         }
         .custom-margin {
     margin-left: 40px;
 }
 .form-control {
         margin-top: 10px;
         padding: 10px;
         font-family: 'Courier New', monospace;
     }
     </style>
     
    
    
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
        <div class="row" style="margin-top: 150px;">
        <div class="col-md-4">
    <b><a class="btn btn-secondary" href="word_file.php" id="Export-link">Export Glossary</a></b>
</div>

            
        </div>
    
    </div>
    
    
    
    
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
