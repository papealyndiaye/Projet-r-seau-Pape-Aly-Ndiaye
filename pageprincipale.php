<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page principale - Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: green;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 34px;
            margin-top:10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="header">
        SMARTTECH
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Connectez-vous en tant que</h1>
        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-primary mx-2" onclick="window.location.href='login.php'">Employé</button>
            <button class="btn btn-secondary mx-2" onclick="window.location.href='loginadmin.php'">Admin</button>
        </div>
    </div>
</body>
</html>
