<?php
include 'dbSmarttech.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricule = $_POST['matricule'];

    $stmt = $conn->prepare("SELECT * FROM employes WHERE matricule = ?");
    $stmt->execute([$matricule]);
    $employe = $stmt->fetch();

    if ($employe) {
        $_SESSION['employe_id'] = $employe['id'];
        $_SESSION['employe_nom'] = $employe['nom'];
        $_SESSION['employe_prenom'] = $employe['prenom'];
        header("Location: envoyerdocuments.php");
        exit();
    } else {
        $error = "Matricule incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Employé</title>
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
    <h1>Connexion Employé</h1>
    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
    <form method="post" action="login.php">
        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
</body>
</html>
