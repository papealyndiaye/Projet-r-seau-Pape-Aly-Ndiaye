<?php include 'dbSmarttech.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
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
    <h1>Gestion des Employés</h1>
    <!-- Formulaire de création d'employé -->
    <form method="post" action="creeremploye.php">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">e-mail</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
    <button type="submit" class="btn btn-success">Ajouter Employé</button>
    <a href="pageprincipale.php" class="btn btn-success ms-auto">Déconnexion</a>
</div>

    </form>
    <!-- Liste des employés -->

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Matricule</th>
            <th>email</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $conn->query("SELECT * FROM employes");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nom']}</td>
                    <td>{$row['prenom']}</td>
                    <td>{$row['matricule']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='supprimeremploye.php?id={$row['id']}' class='btn btn-danger'>Supprimer</a>
                        <a href='modifieremploye.php?id={$row['id']}' class='btn btn-success'>Modifier</a>
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
