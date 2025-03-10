<?php
include 'dbSmarttech.php';
session_start();

if (!isset($_SESSION['employe_id'])) {
    header("Location: login.php");
    exit();
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envoyer_document'])) {
    $destinataire_nom = $_POST['destinataire_nom'];
    $destinataire_prenom = $_POST['destinataire_prenom'];
    $objet = $_POST['objet'];
    $document = $_FILES['document']['name'];
    $uploaded_by = $_SESSION['employe_id'];
    $upload_dir = 'uploads/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    move_uploaded_file($_FILES['document']['tmp_name'], $upload_dir . $document);

    $stmt = $conn->prepare("INSERT INTO documents (nomdocument, dateupload, uploaded_by) VALUES (?, NOW(), ?)");
    $stmt->execute([$document, $uploaded_by]);

    $message = "Document envoyé avec succès !";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['televerser_document'])) {
    $document = $_FILES['file']['name'];
    $upload_dir = 'uploads/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $document);

    // Téléversement vers le serveur FTP
    $host = 'adresse_ip_de_votre_machine_virtuelle';
    $username = 'admin';
    $password = 'aminata';
    $localFile = $upload_dir . $document;
    $remotePath = '/home/admin/ftp/files/' . $document;

    // Construire la commande WinSCP
    $command = "winscp.com /command \"open ftp://$username:$password@$host\" \"put $localFile $remotePath\" \"exit\"";

    // Exécuter la commande et capturer la sortie
    exec($command, $output, $return_var);

    // Vérifier le résultat
    if ($return_var == 0) {
        $message = "Téléversement FTP réussi !";
    } else {
        $message = "Erreur de téléversement FTP.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoi et Téléversement de Documents</title>
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
        .container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .form-container {
            width: 45%;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .message {
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
<div class="header">
        SMARTTECH
    </div>
</head>
<body>
<?php if ($message): ?>
<div class="message">
    <?php echo $message; ?>
</div>
<?php endif; ?>
<div class="container">
    <div class="form-container">
        <h2>Envoyer Document</h2>
        <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
    <label for="destinataire_email" class="form-label">Email du Destinataire</label>
    <input type="email" class="form-control" id="destinataire_email" name="destinataire_email" required>
</div>

            <div class="mb-3">
                <label for="destinataire_prenom" class="form-label">Prénom du Destinataire</label>
                <input type="text" class="form-control" id="destinataire_prenom" name="destinataire_prenom" required>
            </div>
            <div class="mb-3">
                <label for="objet" class="form-label">mesage</label>
                <input type="text" class="form-control" id="objet" name="objet" required>
            </div>
            <div class="mb-3">
                <label for="document" class="form-label">Document à Envoyer</label>
                <input type="file" class="form-control" id="document" name="document" required>
            </div>
            <button type="submit" class="btn btn-success" name="envoyer_document">Envoyer e-mail</button>
        </form>
    </div>
    <div class="form-container">
        <h2>Téléverser Document</h2>
        <form method="post" action="winscp.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Choisir un fichier</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-success" name="televerser_document">Téléverser Document</button>

        </form>
    </div>
</div>
</body>
</html>

