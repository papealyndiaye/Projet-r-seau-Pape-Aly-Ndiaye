<?php include 'dbSmarttech.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Documents</title>
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
<div class="header">
        SMARTTECH
    </div>
</head>
<body>
<div class="container mt-5">
    <h1>Gestion des Documents</h1>
    <!-- Liste des documents -->
    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom du Document</th>
            <th>Date d'Upload</th>
            <th>Uploadé par</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $conn->query("SELECT * FROM documents");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nomdocument']}</td>
                    <td>{$row['dateupload']}</td>
                    <td>{$row['uploaded_by']}</td>
                    <td>
                        <a href='voirdocument.php?id={$row['id']}' class='btn btn-info'>Voir</a>
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
