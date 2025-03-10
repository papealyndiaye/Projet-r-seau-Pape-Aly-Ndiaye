<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés & Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
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
        <h1>Gestion des Employés & Documents</h1>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary" onclick="window.location.href='employes.php'">Employés de Smattech</button>
            <button class="btn btn-secondary" onclick="window.location.href='documents.php'">Documents partagés</button>
        </div>
    </div>
</body>
</html>



