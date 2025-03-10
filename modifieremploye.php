<?php
include 'dbSmarttech.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM employes WHERE id=?");
    $stmt->execute([$id]);
    $employe = $stmt->fetch();

    if (!$employe) {
        die("Employé non trouvé !");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $matricule = $_POST['matricule'];

    $stmt = $conn->prepare("UPDATE employes SET nom=?, prenom=?, matricule=? WHERE id=?");
    $stmt->execute([$nom, $prenom, $matricule, $id]);

    header("Location: employes.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Modifier Employé</h1>
    <form method="post" action="modifieremploye.php">
        <input type="hidden" name="id" value="<?php echo $employe['id']; ?>">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $employe['nom']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $employe['prenom']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule" value="<?php echo $employe['matricule']; ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Modifier Employé</button>
    </form>
</div>
</body>
</html>
