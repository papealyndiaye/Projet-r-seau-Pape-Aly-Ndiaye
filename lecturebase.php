<?php
include 'dbSmarttech';

$stmt = $conn->query("SELECT * FROM employes");
$employes = $stmt->fetchAll();

foreach ($employes as $employe) {
    echo "{$employe['id']} - {$employe['nom']} {$employe['prenom']} ({$employe['matricule']})<br>";
}
?>
