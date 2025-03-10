<?php
include 'dbSmarttech';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM employes WHERE id=?");
    $stmt->execute([$id]);
    echo "Employé supprimé !";

    header("Location: employes.php");
    exit();
}
?>
