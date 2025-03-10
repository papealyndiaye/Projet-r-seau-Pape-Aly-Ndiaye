<?php
include 'dbSmarttech.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $matricule = $_POST['matricule'];

    $stmt = $conn->prepare("INSERT INTO employes (nom, prenom, matricule) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $prenom, $matricule]);
    echo "Employé ajouté avec succès !";

    header("Location: employes.php");
    exit();
}
?>

