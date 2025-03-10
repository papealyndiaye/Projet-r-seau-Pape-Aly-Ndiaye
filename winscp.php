<?php
if (isset($_FILES['file'])) {
    // Informations sur le fichier téléversé
    $localFile = $_FILES['file']['tmp_name'];
    $fileName = basename($_FILES['file']['name']);
    
    // Définir les variables de la commande WinSCP
    $host = '192.168.122.1';
    $username = 'admin';
    $password = 'aminata';
    $remotePath = '/home/admin/ftp/' . $fileName;

    // Construire la commande WinSCP
    $command = "winscp.com /command \"open ftp://$username:$password@$host\" \"put $localFile $remotePath\" \"exit\" 2>&1";

    // Exécuter la commande et capturer la sortie
    exec($command, $output, $return_var);

    // Vérifier le résultat et afficher les messages d'erreur
    if ($return_var == 0) {
        echo "Téléversement réussi\n";
    } else {
        echo "Erreur de téléversement\n";
        echo "Command output: " . implode("\n", $output);
    }
} else {
    echo "Aucun fichier sélectionné\n";
}



