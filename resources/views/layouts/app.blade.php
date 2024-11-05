<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Movie Sales Tracker</title>
     <!-- Add Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>


     <style>
         body {
             background-color: #e1f1fd	;
             font-family: Arial, sans-serif;
         }
         .container {
             max-width: 600px;
             margin-top: 50px;
         }
        .card {
             background-color: white;
             border-radius: 8px;
             padding: 20px;
             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
         }
         .form-label, h2 {
             color: #333;
         }
         .btn-primary {
             background-color: #0056b3;
             border: none;
         }
         .btn-primary:hover {
             background-color: #004080;
         }
     </style>
</head>
<body>
     @include('components.nav')
     <div class="container">
         @yield('content')
     </div>
     <!-- Add Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     
</body>
</html>
